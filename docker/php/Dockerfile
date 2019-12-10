FROM php:fpm

RUN \
    apt-get update && \
    apt-get -y --no-install-recommends install \
        libicu-dev \
        unzip \
        mc && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN \
    docker-php-ext-install \
        pdo_mysql \
        intl

RUN curl --silent --show-error https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer