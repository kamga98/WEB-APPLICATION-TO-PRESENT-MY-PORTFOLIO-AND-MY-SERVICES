FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    nginx \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev  

RUN docker-php-ext-install mysqli pdo pdo_mysql mbstring 
  
# Force PHP-FPM to use TCP
RUN sed -i 's|listen = /run/php/php-fpm.sock|listen = 9000|' /usr/local/etc/php-fpm.d/www.conf

# ✅ Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . /var/www/html
WORKDIR /var/www/html

# Install PHP dependencies 
RUN composer install  

RUN chown -R www-data:www-data /var/www/html

COPY nginx.conf /etc/nginx/nginx.conf
 
EXPOSE 8080  
  
CMD php-fpm -D && nginx -g "daemon off;" 