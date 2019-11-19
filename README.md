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
Obtain Beer list **GET**
```
http://localhost:8080/beers
```
You have available filtering by food pairing with this expression
```
localhost:8080/beers?pairing=Stilton_on_gingerbread_biscuits
localhost:8080/beers?pairing=Stilton%20on%20gingerbread%20biscuits
localhost:8080/beers?pairing=Stilton on gingerbread biscuits
```
You can choose between underscore, spaces, or escape string.

Obtain Beer details **GET**
```
http://localhost:8080/beers/2
```
2 is id of beer collected in list endpoint.
