FROM php:8.3-fpm AS base

# Install dependencies
RUN apt-get update && apt-get install -y \
    nginx \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy source code
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader \
 && php artisan config:cache \
 && php artisan route:cache \
 && php artisan view:cache

# Remove development files (optional)
RUN rm -rf node_modules

# Configure Nginx
COPY nginx/default.conf /etc/nginx/conf.d/default.conf

# Set permissions
RUN chown -R www-data:www-data /var/www \
 && chmod -R 755 /var/www/storage

# Expose port
EXPOSE 80

# Start both Nginx and PHP-FPM together
CMD service nginx start && php-fpm
