FROM phpdockerio/php72-fpm:latest

WORKDIR "/application"

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install  php7.2-mysql \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install git
RUN apt-get update \
    && apt-get -y install git \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN groupadd -g 1001 app && \
    useradd -g 1001 -u 1001 --system --create-home app && \
    touch /var/log/php-fpm.log /var/run/php-fpm.pid && \
    chown -R app:app \
                    # /usr/local/etc/php \
                    # /usr/local/etc/fpm.d \
                    /var/run/php-fpm.pid \
                    /var/log/php-fpm.log \
                    /var/log/php*

USER app
