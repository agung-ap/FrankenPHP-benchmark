FROM httpd:2.4-alpine
RUN sed -i -e 's/#LoadModule proxy_module/LoadModule proxy_module/' \
           -e 's/#LoadModule proxy_fcgi_module/LoadModule proxy_fcgi_module/' \
           /usr/local/apache2/conf/httpd.conf
# Config dosyasının yolu artık apache/vhost.conf oldu
COPY apache/vhost.conf /usr/local/apache2/conf/extra/httpd-vhosts.conf
RUN echo "Include conf/extra/httpd-vhosts.conf" >> /usr/local/apache2/conf/httpd.conf