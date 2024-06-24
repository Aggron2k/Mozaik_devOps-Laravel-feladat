# Dockerfile

# Use the official PHP and Apache base image for Laravel
FROM php:8.2.0-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Enable Apache module for URL rewriting
RUN a2enmod rewrite

# Copy Apache virtual host configuration
COPY ./apache-config/000-default.conf /etc/apache2/sites-available/000-default.conf

# Install required packages for PHP and other utilities
RUN apt-get update -y && apt-get install -y \
    libicu-dev \
    libmariadb-dev \
    unzip zip \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev 

# Install Composer globally from its official Docker image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy Laravel project files (including composer.json and composer.lock)
COPY . /var/www/html

# Install Node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs

# Switch to the directory where Vite will be installed
WORKDIR /var/www/html/resources/js

# Install Vite globally and copy its configuration
RUN npm install vite --global
COPY ./vite.config.js /var/www/html/resources/js/vite.config.js

# Install npm packages for Vite
RUN npm install -g npm@10.8.1

# Switch back to the Laravel project root directory
WORKDIR /var/www/html

# Install PHP extensions required by Laravel
RUN docker-php-ext-install gettext intl pdo_mysql gd

# Configure GD extension with additional libraries
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Install Composer dependencies and generate application key
RUN composer install --no-plugins --no-scripts

# Set appropriate permissions for Laravel directories
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 777 /var/www/html \
    && chown -R www-data:www-data /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/bootstrap/cache \
    && chmod -R 777 /var/www/html/storage \
    && chmod -R 777 /var/www/html/bootstrap/cache

# Vite
RUN npm init -y
RUN npm install vite --save-dev
RUN npm install laravel-vite-plugin --save-dev
# RUN npm run dev


# Run Laravel migrations and seed the database
# RUN php artisan migrate --force
# RUN php artisan db:seed --force

# Start Apache server
CMD ["apache2-foreground"]
