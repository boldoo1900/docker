FROM node:12.14-stretch

WORKDIR /workspace/cache/dev

COPY package*.json ./

RUN npm install && \
    cd /workspace && \
    tar -zcf cache.tar.gz cache && \
    rm -rf cache && \
    rm -rf ~/.npm

CMD ["/bin/sh"]

