
# build scripts
# docker tag app-build:latest host:5000/app:2023-01-01a
# docker build -t host:5000/app:2023-01-01a .
# docker push host:5000/app:2023-01-01a

FROM ubuntu:22.04

RUN TZ=UTC echo 'base @2023-05-30' &&\
 ln -snf /usr/share/zoneinfo/$TZ /etc/localtime &&\
 echo $TZ > /etc/timezone &&\
 apt update &&\
 apt install -y dumb-init software-properties-common &&\
 add-apt-repository ppa:ondrej/php &&\
 apt update &&\
 apt install -y php-common python3-minimal shared-mime-info &&\
 apt remove -y software-properties-common &&\
 apt purge -y software-properties-common &&\
 apt autoremove -y &&\
 apt autoclean -y &&\
 echo 'base done'

RUN echo 'server @2023-05-30' &&\
 apt update &&\
 apt install -y php8.2-cli php8.2-common php8.2-opcache &&\
 apt install -y php8.2-intl php8.2-mbstring php8.2-xml &&\
 apt autoremove -y &&\
 apt autoclean -y &&\
 echo 'server done'

RUN echo library &&\
 apt install -y nginx php8.2-fpm php8.2-gd php8.2-zip php8.2-mysql php8.2-sybase &&\
 apt autoremove -y &&\
 apt autoclean -y &&\
 echo 'library done'

RUN echo additional &&\
 apt install -y php-smbclient &&\
 apt autoremove -y &&\
 apt autoclean -y &&\
 echo 'additional done'

COPY --chown=www-data:www-data public /var/www/source/public
COPY --chown=www-data:www-data vendor /var/www/source/vendor

# COPY --chown=www-data:www-data artisan /var/www/source/artisan
COPY --chown=www-data:www-data *.* /var/www/source/
COPY --chown=www-data:www-data app /var/www/source/app
COPY --chown=www-data:www-data bootstrap /var/www/source/bootstrap
COPY --chown=www-data:www-data config /var/www/source/config
COPY --chown=www-data:www-data hash /var/www/source/hash
COPY --chown=www-data:www-data resources /var/www/source/resources
COPY --chown=www-data:www-data routes /var/www/source/routes
COPY --chown=www-data:www-data deploy /var/www/source/deploy

RUN echo config &&\
 echo '========================================================================' &&\
 mkdir -p /var/www/source/bootstrap/cache &&\
 mkdir -p /var/www/source/storage/app/public &&\
 mkdir -p /var/www/source/storage/framework/cache/data &&\
 mkdir -p /var/www/source/storage/framework/cache/internal &&\
 mkdir -p /var/www/source/storage/framework/sessions &&\
 mkdir -p /var/www/source/storage/framework/testing &&\
 mkdir -p /var/www/source/storage/framework/views &&\
 mkdir -p /var/www/source/storage/logs &&\
 mkdir -p /var/www/source/storage/tmp &&\
 touch /var/www/source/storage/logs/fpm-fcgi-laravel.log &&\
 echo '========================================================================' &&\
 chown -R www-data:www-data /var/www/source/bootstrap &&\
 chown -R www-data:www-data /var/www/source/storage &&\
 echo '========================================================================' &&\
 mkdir -p /run/php &&\
 sed -i 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g' /etc/php/8.2/fpm/php.ini &&\
 mv /var/www/source/deploy/nginx-default.conf /etc/nginx/sites-available/default &&\
 mv /var/www/source/deploy/php-fpm.conf /etc/php/8.2/fpm/php-fpm.conf &&\
 echo '========================================================================' &&\
 service php8.2-fpm stop &&\
 service nginx stop &&\
 echo '========================================================================' &&\
 echo 'config done'

RUN echo cleanup &&\
 apt clean -y &&\
 apt autoclean -y &&\
 rm -rf /var/lib/apt/lists/* &&\
 echo 'cleanup done'

EXPOSE 80
ENTRYPOINT ["/usr/bin/dumb-init", "--"]
CMD echo '[[]] [] mark'$'\n''[['`date +%s.%N`']] ['`date`'] starting w/: '`php8.2 -v` >> /var/www/source/storage/logs/fpm-fcgi-laravel.log && /etc/init.d/php8.2-fpm start && /usr/sbin/nginx && tail -Fqn1 /var/www/source/storage/logs/fpm-fcgi-laravel.log
