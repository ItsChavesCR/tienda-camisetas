FROM php:8.3-cli

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    sqlite3 \
    libsqlite3-dev \
    libzip-dev \
    curl

# Instalar extensiones PHP necesarias
RUN docker-php-ext-install pdo pdo_sqlite zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definir directorio de trabajo
WORKDIR /app

# Copiar proyecto
COPY . .

# Crear archivo .env si no existe
RUN cp .env.example .env || true

# Instalar dependencias Laravel
RUN composer install --no-dev --optimize-autoloader

# Crear base de datos SQLite
RUN mkdir -p database && touch database/database.sqlite

# Permisos correctos
RUN chmod -R 775 storage bootstrap/cache database

# Generar key
RUN php artisan key:generate

# Ejecutar migraciones y seed
RUN php artisan migrate --force
RUN php artisan db:seed --force

# Optimizar Laravel (PRO)
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Exponer puerto (Render usa 10000)
EXPOSE 10000

# Ejecutar servidor
CMD php artisan serve --host=0.0.0.0 --port=10000