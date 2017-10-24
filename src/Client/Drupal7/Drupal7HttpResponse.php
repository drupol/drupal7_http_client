<?php

namespace Http\Client\Drupal7;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Class DrupalResponse
 *
 * @package Http\Adapter\Drupal7
 *
 * @author Pol Dellaiera <pol.dellaiera@protonmail.com>
 */
class Drupal7HttpResponse implements ResponseInterface
{
    /**
     * @var \stdClass
     */
    private $statusCode;

    private $reasonPhrase;

    private $headers;

    private $body;

    private $protocolVersion;

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
        $this->statusCode = $statusCode;
        $this->reasonPhrase = $reasonPhrase;
        $this->headers = $headers;
        $this->body = $body;
        $this->protocolVersion = $protocolVersion;
    }

    public function getProtocolVersion()
    {
        return $this->protocolVersion;
    }

    public function withProtocolVersion($version)
    {
        // TODO: Implement hasHeader() method.
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function hasHeader($name)
    {
        $headers = $this->getHeaders();

        return isset($headers[$name]);
    }

    public function getHeader($name)
    {
        $headers = $this->getHeaders();

        return ($this->hasHeader($name) ? $headers[$name] : null);
    }

    public function getHeaderLine($name)
    {
        // TODO: Implement getHeaderLine() method.
    }

    public function withHeader($name, $value)
    {
        // TODO: Implement withHeader() method.
    }

    public function withAddedHeader($name, $value)
    {
        // TODO: Implement withAddedHeader() method.
    }

    public function withoutHeader($name)
    {
        // TODO: Implement withoutHeader() method.
    }

    public function getBody()
    {
        return $this->body;
    }

    public function withBody(StreamInterface $body)
    {
        // TODO: Implement withBody() method.
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function withStatus($code, $reasonPhrase = '')
    {
        // TODO: Implement withStatus() method.
    }

    public function getReasonPhrase()
    {
        return $this->reasonPhrase;
    }
}
