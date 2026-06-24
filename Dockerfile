FROM php:8.2-apache

# Install system dependencies, ca-certificates, curl, and tools needed for NodeSource
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
    ca-certificates \
    gnupg

# Install Node.js using the correct official Debian repository setup script
RUN mkdir -p /etc/apt/keyrings \
    && curl -fsSL https://nodesource.com | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg \
    && echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://nodesource.com nodistro main" | tee /etc/apt/sources.list.d/nodesource.list \
    && apt-get update && apt-get install -y nodejs

# Install PHP Extensions
RUN docker-php-ext-configure gd \
    && docker-php-ext-install pdo_mysql pdo_pgsql mbstring zip exif pcntl bcmath gd ctype fileinfo xml

# Enable Apache rewrite module
RUN a2enmod rewrite

# Update Apache VirtualHost configuration directly to allow overrides and set document root
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf
RUN sed -i 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf

# Force Apache to allow .htaccess on the public directory specifically
RUN echo '<Directory /var/www/html/public>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/apache2.conf

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files
WORKDIR /var/www/html
COPY . .

# Set Composer environment variable to allow superuser
ENV COMPOSER_ALLOW_SUPERUSER=1

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Install Frontend dependencies and Build assets for Laravel Breeze
RUN npm install && npm run build

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Run migrations automatically before launching Apache
CMD php artisan migrate --force && apache2-foreground

EXPOSE 80
