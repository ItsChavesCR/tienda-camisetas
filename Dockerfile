FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    sqlite3 \
    libsqlite3-dev \
    libzip-dev \
    curl

RUN docker-php-ext-install pdo pdo_sqlite zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

# Forzar .env limpio para Render
RUN rm -f .env
RUN cp .env.example .env

# Configurar SQLite dentro del contenedor
RUN sed -i 's|^APP_ENV=.*|APP_ENV=production|' .env
RUN sed -i 's|^APP_DEBUG=.*|APP_DEBUG=false|' .env
RUN sed -i 's|^DB_CONNECTION=.*|DB_CONNECTION=sqlite|' .env
RUN sed -i 's|^DB_DATABASE=.*|DB_DATABASE=/app/database/database.sqlite|' .env

RUN composer install --no-dev --optimize-autoloader

RUN mkdir -p database && touch database/database.sqlite

RUN chmod -R 775 storage bootstrap/cache database

RUN php artisan key:generate --force

RUN php artisan migrate --force
RUN php artisan db:seed --force

RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000