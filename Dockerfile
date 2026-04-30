FROM php:8.2-cli

# Instalar dependencias
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    sqlite3 \
    libsqlite3-dev

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar directorio
WORKDIR /app

# Copiar proyecto
COPY . .

# Instalar Laravel
RUN composer install --no-dev --optimize-autoloader

# Crear archivo SQLite
RUN touch database/database.sqlite

# Permisos
RUN chmod -R 775 storage bootstrap/cache

# Generar key y migrar
RUN php artisan key:generate
RUN php artisan migrate --force
RUN php artisan db:seed --force

# Exponer puerto
EXPOSE 10000

# Ejecutar servidor
CMD php artisan serve --host=0.0.0.0 --port=10000