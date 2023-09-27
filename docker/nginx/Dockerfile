FROM nginx:alpine

COPY nginx.conf /etc/nginx/
COPY web.conf   /etc/nginx/conf.d/default.conf

RUN echo "upstream php-upstream { server edmundo:9000; }" > /etc/nginx/conf.d/upstream.conf

VOLUME /var/www/edmundo

EXPOSE 80

CMD ["nginx"]