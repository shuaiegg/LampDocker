# 使用官方的 Nginx 镜像
FROM nginx:latest

#删除默认的Nginx 配置文件
RUN rm /etc/nginx/conf.d/default.conf

# 复制项目的 Nginx 配置文件到容器
COPY ./config/nginx.conf /etc/nginx/nginx.conf

# 复制项目的网页文件到 Nginx 的默认服务目录
COPY ./html /var/www/html

# 赋予适当的权限
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80