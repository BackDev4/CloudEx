FROM back4app/php

# Установить расширения PHP
RUN docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath gd intl

# Установить скрипт сборки Vite
RUN npm install -g vite

# Копировать исходные файлы проекта в контейнер
COPY . /var/www/html

# Установить зависимости Laravel
RUN composer install --no-dev --no-interaction --optimize-autoloader --ignore-platform-reqs

# Установить зависимости NPM и скомпилировать файлы
RUN npm install && vite build

# Назначить права доступа к папкам storage и bootstrap в Laravel проекте
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Предоставить конфигурацию Apache
COPY ./apache.conf /etc/apache2/sites-available/000-default.conf
