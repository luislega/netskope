FROM php:7.3-apache

#Install git and MySQL extendions for PHP

RUN apt-get update && apt-get install -y git
RUN apt-get install -y vim-tiny
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite

COPY . /var/www/html/netskope
COPY init/000-default.conf /etc/apache2/sites-available/
EXPOSE 80/tcp
EXPOSE 443/tcp
