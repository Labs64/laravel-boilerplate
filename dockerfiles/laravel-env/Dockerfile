FROM centos:7

MAINTAINER Labs64 GmbH info@labs64.com

# Install some must-haves
RUN yum -y update
RUN yum -y install vim wget
RUN yum -y install git
RUN git --version

# Install PHP 7.1 on CentOS
RUN rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm \
	&& rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm
RUN yum install yum-utils
RUN yum-config-manager --enable remi-php71
RUN yum -y update

RUN yum -y install php71w \
                   php71w-fpm \
                   php71w-common \
                   php71w-cli \
                   php71w-curl \
                   php71w-mbstring \
                   php71w-mcrypt \
                   php71w-xml \
                   php71w-pdo \
                   php71w-gd \
                   php71w-mysqlnd \
                   php71w-pgsql \
                   php71w-bcmath \
                   php71w-opcache

RUN php -v

RUN yum clean all

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/bin/composer

# Install Node.js
RUN curl -sL https://rpm.nodesource.com/setup_7.x | bash -
RUN yum -y install nodejs
RUN yum list installed nodejs
RUN node -v

WORKDIR /var/www

# Expose ports
EXPOSE 9000
