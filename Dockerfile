FROM alpine:3.17
RUN apk add --no-cache composer php81-tokenizer php81-pecl-swoole go
WORKDIR /opt
