<?php

namespace Http\Client\Drupal7;

use Http\Client\HttpClient;
use Http\Discovery\ClassDiscovery;
use Psr\Http\Message\RequestInterface;

/**
 * HTTP Client for Drupal 7.
 *
 * @author Pol Dellaiera <pol.dellaiera@protonmail.com>
 */
class Client implements HttpClient
{
    /**
     * {@inheritdoc}
     */
    public function sendRequest(RequestInterface $request)
    {
        $options = array(
          'headers' => $request->getHeaders(),
          'method' => $request->getMethod(),
          'data' => $request->getBody(),
        );

        return new Drupal7HttpResponse(drupal_http_request($request->getUri(), array_filter($options)));
    }
}
