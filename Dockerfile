FROM php:8.2-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY . .

# Create the database directory and file during the build process
RUN mkdir -p /var/www/database && touch /var/www/database/database.sqlite && chmod -R 777 /var/www/database

# Verify the database file
RUN ls -l /var/www/database/database.sqlite

RUN composer install --no-dev --optimize-autoloader

RUN php artisan config:cache && \
    php artisan view:cache

RUN php artisan migrate --force && php artisan db:seed --force

EXPOSE 9000

CMD ["php-fpm"]
