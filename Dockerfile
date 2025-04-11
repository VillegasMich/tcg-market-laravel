FROM php:8.3.11-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    zip unzip git curl libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy everything into container
COPY . /var/www/html

# Use custom Apache config to serve from /public
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Run Composer in the correct directory
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Laravel setup
RUN php artisan key:generate \
    && php artisan migrate \
    && php artisan db:seed \
    && chmod -R 777 storage bootstrap/cache

