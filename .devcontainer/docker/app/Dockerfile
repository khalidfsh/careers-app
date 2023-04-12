FROM node:18 as node

FROM php:8.0-apache

# Install Node.js
COPY --from=node /usr/local /usr/local

# Install required system packages and PHP extensions
RUN apt-get update && apt-get install -y \
        libicu-dev \
        libpq-dev \
        libzip-dev \
        unzip \
        git \
    && docker-php-ext-install \
        intl \
        pdo_pgsql \
        zip \
    && a2enmod rewrite

# Change the document root of Apache to /workspace/public
ENV APACHE_DOCUMENT_ROOT /workspace/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

WORKDIR /workspace