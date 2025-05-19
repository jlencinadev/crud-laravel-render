FROM php:8.3-fpm-alpine

WORKDIR /var/www/html

# Instalar las bibliotecas de desarrollo de PostgreSQL
RUN apk add --no-cache libpq-dev

# Instalar oniguruma
RUN apk add --no-cache oniguruma-dev

# Instalar extensiones PHP necesarias
RUN docker-php-ext-install pdo pdo_pgsql bcmath mbstring exif pcntl gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Copiar los archivos de la aplicación
COPY . .

# Instalar las dependencias de Composer
RUN composer install --no-dev --optimize-autoloader

# Copiar el archivo .env (se configurará en Render)
COPY .env.example .env

# Generar la key de la aplicación
RUN php artisan key:generate

# Optimizar la aplicación para producción
RUN php artisan route:cache
RUN php artisan config:cache
RUN php artisan view:cache

# Establecer los permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Exponer el puerto 8000 (el puerto por defecto de Artisan serve)
EXPOSE 8000

# Comando para iniciar el servidor de Artisan (solo para desarrollo, Render usará su propio servidor)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
