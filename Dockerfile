FROM php:7.4-fpm

# Обновить список пакетов и установить нужные зависимости
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
    libssl-dev

# Установить расширения PHP
RUN docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath gd intl

# Установить Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Копировать исходные файлы проекта в контейнер
COPY . /var/www/html

# Установить зависимости Laravel
RUN cd /var/www/html && composer install --no-dev --no-interaction --optimize-autoloader --ignore-platform-reqs

# Назначить права доступа к папкам storage и bootstrap в Laravel проекте
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Предоставить конфигурацию Nginx
COPY docker/nginx/default.conf /etc/nginx/sites-available/default

# Предоставить конфигурацию PHP-FPM
COPY docker/php-fpm/php.ini /usr/local/etc/php/php.ini

# Открыть порт 80
EXPOSE 80

# Команда для запуска сервера Nginx и PHP-FPM
CMD service nginx start && php-fpm
