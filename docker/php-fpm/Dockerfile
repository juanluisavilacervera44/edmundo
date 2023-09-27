FROM php:8-fpm-alpine

ARG USER_ID=1000
ARG GROUP_ID=1000

RUN apk update \
    && apk add git \
        curl \
        vim \
        wget \
        bash \
        zlib \
        zlib-dev \
        patch \
        icu-dev \
        yarn \
        php-pgsql \
        linux-headers


RUN set -ex \
  && apk --no-cache add \
    postgresql-dev
# install php-fpm dependencies
RUN apk add --no-cache $PHPIZE_DEPS \
    && pecl install -f xdebug \
    && docker-php-ext-install intl opcache bcmath sockets pdo_pgsql \
    && docker-php-ext-enable xdebug intl opcache bcmath sockets pdo_pgsql \
    && rm -rf /var/lib/apt/lists/*

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer selfupdate

# Set timezone
ENV TIMEZONE=Etc/UCT
RUN ln -snf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime && echo ${TIMEZONE} > /etc/timezone \
    && printf '[PHP]\ndate.timezone = "%s"\n', ${TIMEZONE} > /usr/local/etc/php/conf.d/tzone.ini \
    && "date"

# configure PHP and debugging command
COPY php.ini /usr/local/etc/php/conf.d/

WORKDIR /var/www/edmundo
VOLUME /var/www/edmundo

EXPOSE 9000

CMD ["php-fpm", "-F"]