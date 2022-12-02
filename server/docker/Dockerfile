FROM php:8.0.0-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN pecl install -o -f redis && rm -rf /tmp/pear && docker-php-ext-enable redis

