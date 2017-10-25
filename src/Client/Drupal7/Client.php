<?php

namespace Http\Client\Drupal7;

use Http\Client\HttpClient;
use Http\Message\Drupal7\Response;
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
            'headers' => array_map(function ($item) {
                return array_pop($item);
            }, array_filter($request->getHeaders())),
            'method' => $request->getMethod(),
            'data' => $request->getBody()->__toString(),
        );

        $request = drupal_http_request((string) $request->getUri(), array_filter($options));

        $response = new Response(
            $request->code,
            property_exists($request, 'status_message') ? $request->status_message : null,
            property_exists($request, 'headers') ? $request->headers : array(),
            property_exists($request, 'data') ? $request->data : null,
            property_exists($request, 'protocol') ? $request->protocol : null
        );

        $response->setRawRequest($request);

        return $response;
    }
}
