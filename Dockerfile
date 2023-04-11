FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    && docker-php-ext-install pdo_mysql

COPY . /var/www/html/
COPY 000-default.conf /etc/apache2/sites-available/
RUN a2enmod rewrite
