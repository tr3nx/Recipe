FROM php:7.4.0beta2-fpm-alpine3.10

RUN apk update && apk add build-base

RUN apk add git postgresql postgresql-dev \
	&& docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
	&& docker-php-ext-install pdo pdo_pgsql pgsql

RUN curl -sS https://getcomposer.org/installer | php \
	&& mv composer.phar /usr/local/bin/ \
	&& ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

COPY ./src /var/www

WORKDIR /var/www

RUN mkdir -p /var/www/storage/logs

RUN composer install --prefer-source --no-interaction

ENV PATH="~/.composer/vendor/bin:./vendor/bin:${PATH}"

RUN chown -R www-data:www-data /var/www
