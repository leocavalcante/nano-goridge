# Nano Goridge

- [Nano](https://nano.hyperf.wiki)
- [Goridge](https://github.com/roadrunner-server/goridge)

Proof of concept on running Hyperf's Nano with Spiral's Goridge

## Getting started

Build the Docker image with PHP, Composer, Swoole and Go.
```shell
make image
```

Run a container.
```shell
make up
```

Start an interactive shell.
```shell
make sh
```

> Inside the container

Run the Go app with:
```shell
go run -mod=readonly .
```
> `readonly` is to avoid confusion on Composer's `vendor/` and Go's `vendor/`.

Install PHP dependencies.
```shell
composer install
```

Run the Nano command.
```shell
php app.php hello-go
```
