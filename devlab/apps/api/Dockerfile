# Use the official PHP image as base
FROM php:8.2-cli

# Set working directory
WORKDIR /var/www/html

# Install PHP extensions and other dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev git unzip \
    && docker-php-ext-install pdo pdo_pgsql \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set COMPOSER_ALLOW_SUPERUSER to allow plugins to run as root
ENV COMPOSER_ALLOW_SUPERUSER=1

# Copy the application code
COPY . .

# Install Composer dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Set up permissions
RUN chown -R www-data:www-data /var/www/html

# Expose the application port
EXPOSE 8000

# Start Symfony server
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
