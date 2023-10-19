FROM php:8.2-fpm

ARG WITH_XDEBUG=true

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install pdo pdo_mysql; \
    if [ $WITH_XDEBUG = "true" ] ; then \
        pecl install xdebug; \
    fi ;


RUN apt-get -y install git
RUN apt-get -y install vim
RUN apt-get -y install wget
RUN git config --global user.email "hamidreza.tahmooresi@gmail.com"
#RUN curl -sS https://get.symfony.com/cli/installer | bash
# RUN wget https://get.symfony.com/cli/installer
# RUN /bin/bash -c ./installer
RUN wget https://get.symfony.com/cli/installer -O - | bash
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN /root/.symfony5/bin/symfony new /var/www/html/ --version=6.3.* --webapp
RUN export PATH="$HOME/.symfony5/bin:$PATH"


