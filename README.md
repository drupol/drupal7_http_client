# Drupal 7 HTTP Client

This is a small experimental library to bridge [HTTPlug](https://github.com/php-http/httplug) and Drupal 7.

The function sending requests in Drupal 7 is [drupal_http_request()](https://api.drupal.org/api/drupal/includes%21common.inc/function/drupal_http_request/7.x).
The return of it is not [PSR-7](http://www.php-fig.org/psr/psr-7/) compatible.

This library standardize this and allows you to send HTTP requests and get HTTP responses in [PSR-7 standard](http://www.php-fig.org/psr/psr-7/) by using Drupal 7 API.

## Installation

```php
composer require drupol\drupal7_http_client
```

## Usage

A **GET** request:

```php
  $client = new \Http\Client\Drupal7\Client();
  $message = new \Http\Message\Drupal7\MessageFactory();

  $request = $message->createRequest('GET', 'http://google.com/');
  $response = $client->sendRequest($request);
```

A **POST** request:

```php
  $uri = 'http://google.com/';
  $data = array(
    'body' => 'Lorem Ipsum Dolor Sit Amet',
  );

  $client = new \Http\Client\Drupal7\Client();
  $message = new \Http\Message\Drupal7\MessageFactory();

  $request = $message->createRequest('POST', $uri, array(), drupal_http_build_query($data));
  $response = $client->sendRequest($request);
```
