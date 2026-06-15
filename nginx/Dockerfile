FROM nginx:1.27-alpine
RUN rm /etc/nginx/conf.d/default.conf
# Config dosyasının yolu artık nginx/nginx.conf oldu
COPY nginx/nginx.conf /etc/nginx/conf.d/