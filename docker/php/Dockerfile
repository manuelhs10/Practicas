FROM php:8.2-apache

# Instalamos extensiones necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Copiar el proyecto al servidor Apache dentro del contenedor
COPY ./ /var/www/html/

# Dar permisos
RUN chown -R www-data:www-data /var/www/html
