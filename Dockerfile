ARG PHP_MODE='cli'

FROM php:8.1-${PHP_MODE}-alpine

RUN docker-php-ext-install pdo_mysql
