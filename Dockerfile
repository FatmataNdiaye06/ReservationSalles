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

# Supprimer la configuration par défaut d'Nginx pour éviter les conflits
RUN rm -f /etc/nginx/sites-enabled/default /etc/nginx/conf.d/default.conf

# Copier la configuration Nginx personnalisée
COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/html
COPY . /var/www/html

# Installer les dépendances PHP via Composer
RUN composer install --no-dev --optimize-autoloader

# Script de démarrage pour lancer Nginx et PHP-FPM en même temps sur le port de Render
RUN echo '#!/bin/sh\n\
echo "listen = 127.0.0.1:9000" >> /usr/local/etc/php-fpm.d/zz-docker.conf\n\
PORT=\${PORT:-10000}\n\
sed -i "s/listen [0-9]\+;/listen 0.0.0.0:\$PORT;/" /etc/nginx/conf.d/default.conf\n\
php-fpm -D\n\
sleep 1\n\
nginx -g "daemon off;"' > /start.sh && chmod +x /start.sh

CMD ["/start.sh"]