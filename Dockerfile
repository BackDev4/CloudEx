FROM php:7.4-apache

# Обновить список пакетов и установить нужные зависимости
RUN apt-get update && apt-get install -y \
    git \
    libzip-dev \
    zip \
    unzip \
    mariadb-client

# Установить расширения PHP
RUN docker-php-ext-configure zip
RUN docker-php-ext-install pdo pdo_mysql zip

# Установить Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Установить Node.js и npm
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs

# Копировать исходные файлы проекта в контейнер
COPY . /var/www/html

# Установить зависимости Laravel
RUN cd /var/www/html && composer install --no-dev --no-interaction --optimize-autoloader --ignore-platform-reqs

# Установить зависимости npm
RUN cd /var/www/html && npm install

# Скопировать конфигурацию MySQL
COPY docker/mysql/my.cnf /etc/mysql/my.cnf

# Создать базу данных
RUN service mysql start && \
    mysql -uroot -e "CREATE DATABASE cloudEx;" && \
    mysql -uroot -e "GRANT ALL PRIVILEGES ON cloudEx.* TO 'cloudEx'@'localhost' IDENTIFIED BY 'password';"

# Собрать статические файлы в проекте
RUN cd /var/www/html && npm run prod

# Назначить права доступа к папкам storage и bootstrap в Laravel проекте
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Указать рабочую директорию
WORKDIR /var/www/html

# Открыть порт 80
EXPOSE 80

# Команда для запуска сервера Apache
CMD ["apache2-foreground"]
