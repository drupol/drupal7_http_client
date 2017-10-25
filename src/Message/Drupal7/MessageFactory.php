<?php

namespace Http\Message\Drupal7;

use Http\Message\MessageFactory as HttpMessageMessageFactory;

/**
 * Class MessageFactory
 *
 * @package Http\Adapter\Drupal7
 *
 * @author Pol Dellaiera <pol.dellaiera@protonmail.com>
 */
class MessageFactory implements HttpMessageMessageFactory
{
    public function createRequest(
        $method,
        $uri,
        array $headers = array(),
        $body = null,
        $protocolVersion = '1.1'
    ) {
        return new Request($uri, array(
            'method' => $method,
            'headers' => $headers,
            'data' => $body,
        ));
    }

    public function createResponse(
        $statusCode = 200,
        $reasonPhrase = null,
        array $headers = array(),
        $body = null,
        $protocolVersion = '1.1'
    ) {
        return new Response($statusCode, $reasonPhrase, $headers, $body, $protocolVersion);
    }
}
