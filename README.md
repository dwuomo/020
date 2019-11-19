## Installation
```
$ composer install
```

## Run tests
```
$ php bin/phpunit
```

## Run project
Move cursor to root project

```
$ php -S localhost:8080 -t public/
```

## Available endpoints
Obtain Beer list
GET
```
http://localhost:8080/beers
```

Obtain Beer details

GET
```
http://localhost:8080/beers/2
```
2 is id of beer collected in list endpoint.
