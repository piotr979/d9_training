FROM php:8.1-apache
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN a2enmod rewrite
RUN apt-get update \
  && apt-get install -y libzip-dev libpng-dev git wget --no-install-recommends \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
 
RUN docker-php-ext-install pdo mysqli pdo_mysql zip gd;
RUN wget https://getcomposer.org/download/2.3.10/composer.phar \ 
    && mv composer.phar /usr/bin/composer && chmod +x /usr/bin/composer
COPY apache/apache.conf /etc/apache2/sites-enabled/000-default.conf
# COPY . /var/www
# WORKDIR /var/www
CMD ["apache2-foreground"]