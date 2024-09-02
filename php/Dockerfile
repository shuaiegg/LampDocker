# 基础镜像，使用官方的 PHP 镜像
FROM php:8.2-fpm

# 安装系统依赖项和 PHP 扩展
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    libc-client-dev \
    libkrb5-dev \
    libssl-dev \
    zlib1g-dev \
    libicu-dev \
    libxml2-dev \
    libsqlite3-dev \
    libedit-dev \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-install -j$(nproc) gd mbstring zip opcache imap intl pdo pdo_mysql pdo_sqlite bcmath mysqli pdo pdo_mysql \
    && apt-get clean

# 安装 Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 设置文件权限
RUN chown -R www-data:www-data /var/www/html

# 设置工作目录
WORKDIR /var/www/html
