# FROM php:8.3.11-apache
# RUN apt-get update -y && apt-get install -y openssl zip unzip git
# RUN docker-php-ext-install pdo_mysql
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# COPY . /var/www/html
# COPY ./public/.htaccess /var/www/html/.htaccess
# WORKDIR /var/www/html
# RUN composer install \
#     --ignore-platform-reqs \
#     --no-interaction \
#     --no-plugins \
#     --no-scripts \
#     --prefer-dist
#
# RUN php artisan key:generate
# RUN php artisan migrate
# RUN php artisan db:seed
# RUN chmod -R 777 storage
# RUN a2enmod rewrite
# RUN service apache2 restart

FROM php:8.3.11-apache

# Install system dependencies
RUN apt-get update -y && apt-get install -y openssl zip unzip git

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy Laravel app
COPY . /var/www/html

# Use custom Apache configuration to point to /public
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Laravel dependencies
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# Laravel setup
RUN php artisan key:generate \
    && php artisan migrate \
    && php artisan db:seed \
    && chmod -R 777 storage bootstrap/cache

