# Use a imagem oficial do PHP com Apache
FROM php:8.1-apache

# Instale extensões necessárias para o Laravel
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl \
    && docker-php-ext-install zip pdo pdo_mysql

# Habilite o mod_rewrite do Apache
RUN a2enmod rewrite

# Instale o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copie os arquivos do projeto para o contêiner
COPY . /var/www/html

# Configure permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Configure o diretório de trabalho
WORKDIR /var/www/html

# Gere a chave do Laravel e o cache de configuração
RUN composer install --no-dev --optimize-autoloader \
    && php artisan key:generate \
    && php artisan config:cache
