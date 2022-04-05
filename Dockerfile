FROM alpine

ADD . /var/www/html/
RUN chmod -R 777 /var/www/html/storage

RUN apt-get update
RUN apt-get -y install curl gnupg
RUN curl -sL https://deb.nodesource.com/setup_12.x  | bash -
RUN apt-get -y install nodejs
RUN npm install

WORKDIR /var/www/html
