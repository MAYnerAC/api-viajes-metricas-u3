FROM php:8.2-zts-alpine

WORKDIR /var/www/html

# Instalar dependencias necesarias
RUN apk add --no-cache $PHPIZE_DEPS \
    && apk add --no-cache autoconf dpkg-dev dpkg file g++ gcc libc-dev make pkgconf re2c \
    && docker-php-ext-install bcmath \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && docker-php-ext-install mysqli pdo_mysql

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiar archivos del proyecto e instalar dependencias de Composer
COPY . .
RUN composer install

# Comando predeterminado para ejecutar la aplicación Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0"]
