FROM php:8.2-apache

# Install system dependencies and ALL required PHP extensions including pgsql
RUN apt-get update && apt-get install -y \
    libpng-dev \
    zlib1g-dev \
    libxml2-dev \
    libzip-dev \
    libonig-dev \
    libcurl4-openssl-dev \
    libsqlite3-dev \
    libpq-dev \
    zip \
    curl \
    unzip \
    git \
    && docker-php-ext-configure gd \
    && docker-php-ext-install pdo_mysql pdo_pgsql mbstring zip exif pcntl bcmath gd ctype fileinfo xml

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set Document Root to public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files
WORKDIR /var/www/html
COPY . .

# Set Composer environment variable to allow superuser
ENV COMPOSER_ALLOW_SUPERUSER=1

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80
