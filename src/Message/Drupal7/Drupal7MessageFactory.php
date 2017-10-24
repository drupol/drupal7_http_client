<?php

namespace Http\Message\Drupal7;

use Http\Client\Drupal7\Drupal7HttpRequest;
use Http\Client\Drupal7\Drupal7HttpResponse;
use Http\Message\MessageFactory;

/**
 * Class Drupal7MessageFactory
 *
 * @package Http\Adapter\Drupal7
 *
 * @author Pol Dellaiera <pol.dellaiera@protonmail.com>
 */
class Drupal7MessageFactory implements MessageFactory
{
    public function createRequest(
        $method,
        $uri,
        array $headers = [],
        $body = null,
        $protocolVersion = '1.1'
    ) {
        return new Drupal7HttpRequest($uri, array());
    }

    public function createResponse(
        $statusCode = 200,
        $reasonPhrase = null,
        array $headers = [],
        $body = null,
        $protocolVersion = '1.1'
    ) {
        return new Drupal7HttpResponse($statusCode, $reasonPhrase, $headers, $body, $protocolVersion);
    }
}
