FROM php:8.1-cli

RUN apt-get update && apt-get install -y \
    libpq-dev \
    wget \
    zlib1g-dev \
    libmcrypt-dev \
    libzip-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libicu-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

# Composer install
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# git нужен для работы с рецептами для пэкаджей из папки vendor
RUN apt-get -y update
RUN apt-get -y install git

# памяти не хватает для выполнения composer recipes:update
RUN echo 'memory_limit = 256M' >> /usr/local/etc/php/conf.d/docker-php-memory_limit.ini;

RUN docker-php-ext-install pdo pdo_mysql zip
RUN apt-get update && apt-get install -y unzip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN useradd -d /home/develop -m -s /bin/bash develop && echo "develop:develop" | chpasswd && adduser develop sudo
WORKDIR /project
RUN chown -R develop:develop /project
USER develop