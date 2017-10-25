<?php

namespace Http\Message\Drupal7;

use GuzzleHttp\Psr7\Response as GuzzleHttpPsr7Response;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Response
 *
 * @package Http\Adapter\Drupal7
 *
 * @author Pol Dellaiera <pol.dellaiera@protonmail.com>
 */
class Response extends GuzzleHttpPsr7Response implements ResponseInterface
{
    /**
     * Original Drupal request.
     *
     * @var \stdClass
     */
    private $rawRequest;

    /**
     * Drupal7HttpResponse constructor.
     *
     * @param $statusCode
     * @param $reasonPhrase
     * @param $headers
     * @param $body
     * @param $protocolVersion
     */
    public function __construct($statusCode, $reasonPhrase, $headers, $body, $protocolVersion)
    {
        parent::__construct($statusCode, $headers, $body, $protocolVersion, $reasonPhrase);
    }

    /**
     * Set the original Drupal request from drupal_http_request().
     *
     * @param \stdClass $request
     */
    public function setRawRequest(\stdClass $request)
    {
        $this->rawRequest = $request;
    }

    /**
     * Get the original Drupal request from drupal_http_request().
     *
     * @return \stdClass
     */
    public function getRawRequest()
    {
        return $this->rawRequest;
    }
}
