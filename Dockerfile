FROM php:8.3-fpm

# Installer les extensions nécessaires et Nginx
RUN apt-get update && apt-get install -y \
    nginx \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    git \
    unzip \
    && docker-php-ext-install pdo pdo_mysql

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier la configuration Nginx personnalisée
COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/html
COPY . /var/www/html

# Installer les dépendances PHP via Composer
RUN composer install --no-dev --optimize-autoloader

# Script de démarrage pour lancer Nginx et PHP-FPM en même temps sur le port de Render
RUN echo '#!/bin/sh\n\
sed -i "s/listen = 9000/listen = 127.0.0.1:9000/" /usr/local/etc/php-fpm.d/www.conf\n\
sed -i "s/listen 80;/listen ${PORT:-10000};/" /etc/nginx/conf.d/default.conf\n\
php-fpm -D\n\
nginx -g "daemon off;"' > /start.sh && chmod +x /start.sh

CMD ["/start.sh"]