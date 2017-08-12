FROM php:7.1-apache

RUN buildDeps=" \
        libbz2-dev \
    " \
    runtimeDeps=" \
        curl \
        libfreetype6-dev \
        libicu-dev \
        libjpeg-dev \
        libmcrypt-dev \
        libpng12-dev \
        libpq-dev \
        libmysqlclient-dev \
        mysql-client \
    " \
    phpExtensions=" \
        zip \
        bz2 \
        calendar \
        iconv \
        intl \
        mbstring \
        mcrypt \
        mysqli \
        pdo_mysql \
    " \
    && apt-get update && apt-get install -y $buildDeps $runtimeDeps \
    && docker-php-ext-install $phpExtensions \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd \
    && apt-get purge -y --auto-remove $buildDeps \
    && rm -r /var/lib/apt/lists/* \
    && a2enmod rewrite
