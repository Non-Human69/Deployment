FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install zip pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy application files
COPY . .

# Install Laravel dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Create Laravel .env file if it doesn't exist
RUN cp .env.example .env || true

# Generate application key
RUN php artisan key:generate || true

# Expose the port Laravel will run on
EXPOSE 8000

# Create SQLite database file
RUN mkdir -p /var/www/database && touch /var/www/database/database.sqlite

# Run migrations and seeders
RUN php artisan migrate --force && php artisan db:seed --force

# Start Laravel server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
