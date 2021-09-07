FROM ubuntu:20.04

MAINTAINER cuong.ngo

RUN apt-get update && apt-get install -y language-pack-en

RUN locale-gen en_US.UTF-8

ENV LANGUAGE=en_US.UTF-8
ENV LC_ALL=en_US.UTF-8
ENV LC_CTYPE=UTF-8
ENV LANG=en_US.UTF-8
ENV TERM xterm

ARG DEBIAN_FRONTEND=noninteractive

# Install PHP, some PHP extentions and some useful Tools with APT

RUN apt-get update && apt-get install -y software-properties-common
RUN add-apt-repository ppa:ondrej/php

RUN apt-get update && apt-get install -y --allow-remove-essential \
        php7.4 \
        php7.4-fpm \
        php7.4-cli \
        php7.4-dev \
        php7.4-phpdbg \
        php7.4-common \
        php7.4-curl \
        php7.4-xml \
        php7.4-mbstring \
        php7.4-mysql \
        php7.4-pgsql \
        php7.4-zip \
        php7.4-imagick \
        php7.4-xdebug \
        php7.4-gd \
        php7.4-redis \
        php7.4-xsl \
        php7.4-amqp \
        git \
        curl \
        vim \
        nano \
        npm \
        telnetd \
        wget \
        openssl \
    && apt-get clean


# Install Symfony CLI
RUN wget https://get.symfony.com/cli/installer -O - | bash


# Install NodeJs 12x
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash
RUN apt-get install -y nodejs

# Install composer
RUN curl -s http://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Configure Nginx
RUN apt-get -yqq update; apt-get -yqq install nginx
ADD default.conf /etc/nginx/conf.d/default.conf
ADD nginx.conf /etc/nginx/nginx.conf

# Laravel Worker supervisor
#ADD laravel-worker.conf /etc/supervisor/conf.d/laravel-worker.conf

# Clean up
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN mkdir -p /var/www/project
WORKDIR /var/www/project

RUN usermod -u 1000 www-data

CMD service php7.4-fpm start && nginx

EXPOSE 80 9000
