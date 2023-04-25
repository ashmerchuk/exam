FROM nginx:stable-alpine3.17

VOLUME /var/www/html
WORKDIR /var/www/html

#COPY ./ /var/www/php
COPY ./docker/nginx/* /etc/nginx/conf.d/
