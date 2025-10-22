# Dockerfile
FROM php:8.2-fpm

# Instala extensões necessárias
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl \
    && docker-php-ext-install pdo pdo_mysql zip

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copia o projeto
WORKDIR /var/www
COPY . .

# Instala dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# Permissões para storage e cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expondo porta
EXPOSE 9000

# Comando para rodar o PHP-FPM
CMD ["php-fpm"]
