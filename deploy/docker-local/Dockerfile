FROM php:7.4-fpm

WORKDIR /var/www/html

RUN apt update && apt install -y --no-install-recommends \
    libc-client-dev \
    build-essential \
    libkrb5-dev \
    supervisor \
    libpng-dev \
    libjpeg-dev \
    vim \
    nano \
    webp \
    libwebp-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    unzip \
    wget \
    gnupg \
    htop \
    ldap-utils \
    libmcrypt-dev \
    libzip-dev \
    libxml2-dev \
    graphviz

RUN docker-php-ext-install exif pcntl \
    && docker-php-ext-install gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-source delete

RUN docker-php-ext-configure gd --enable-gd --with-jpeg

RUN apt clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-install imap soap

RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
RUN locale-gen pt_BR.UTF-8

RUN pecl install mongodb-1.8.1

ADD php.ini /usr/local/etc/php/

ADD www.conf /usr/local/etc/php-fpm.d/

COPY ./supervisord/supervisord.conf /etc/supervisord.conf

RUN touch /var/log/supervisord.log

ADD ./php-fpm.conf /usr/local/etc/php-fpm.conf
