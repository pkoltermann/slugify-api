FROM kolemp/docker-php-nginx:7.2

COPY web/index.php /data/application/web/index.php
COPY composer.json /data/application/composer.json
COPY composer.lock /data/application/composer.lock
RUN composer install && mkdir -p web && chown -R www-data:www-data /data/application
