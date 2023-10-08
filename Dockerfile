FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    git \
    libzip-dev \
    zip \
    unzip \
    libonig-dev \
    libxml2-dev \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    libmagickwand-dev \
    libmcrypt-dev \
    libzip-dev \
    libssl-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libfreetype6-dev \
    libicu-dev \
    zlib1g-dev \
    libmemcached-dev \
    libmcrypt-dev \
    libmagickwand-dev \
    libmagickcore-dev \
    libssl-dev \
    && apt-get install -y npm \
    && rm -rf /var/lib/apt/lists/*

# Установить расширения PHP
RUN docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath gd intl

# Установить Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Копировать исходные файлы проекта в контейнер
COPY . /var/www/html

# Установить зависимости Laravel
RUN cd /var/www/html && composer install --no-dev --no-interaction --optimize-autoloader --ignore-platform-reqs

# Установить зависимости NPM и скомпилировать файлы
RUN cd /var/www/html && npm install && npm install -g vite && vite build

# Назначить права доступа к папкам storage и bootstrap в Laravel проекте
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
