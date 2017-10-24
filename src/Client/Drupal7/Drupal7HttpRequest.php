<?php

namespace Http\Client\Drupal7;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

/**
 * Class DrupalRequest
 *
 * @package Http\Adapter\Drupal7
 *
 * @author Pol Dellaiera <pol.dellaiera@protonmail.com>
 */
class Drupal7HttpRequest implements RequestInterface
{
    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $uri;

    /**
     * @var float
     */
    private $timeout = 30.0;

    /**
     * @var int
     */
    private $maxRedirect = 3;

    /**
     * @var mixed
     */
    private $context = null;

    /**
     * @var string
     */
    private $data;

    /**
     * @var array
     */
    private $headers;

    /**
     * Drupal7HttpRequest constructor.
     *
     * @param $uri
     * @param array $options
     */
    public function __construct($uri, array $options = array())
    {
        // Merge the default options.
        $options += array(
          'headers' => array(),
          'method' => 'GET',
          'data' => null,
          'max_redirects' => 3,
          'timeout' => 30.0,
          'context' => null,
        );

        // Merge the default headers.
        $options['headers'] += array(
          'User-Agent' => 'Drupal (+http://drupal.org/)',
        );

        // stream_socket_client() requires timeout to be a float.
        $options['timeout'] = (float) $options['timeout'];

        $this->uri = $uri;
        $this->headers = $options['headers'];
        $this->method = $options['method'];
        $this->data = $options['data'];
        $this->maxRedirect = $options['max_redirects'];
        $this->timeout = $options['timeout'];
        $this->context = $options['context'];
    }

    public function getProtocolVersion()
    {
        // TODO: Implement getProtocolVersion() method.
    }

    public function withProtocolVersion($version)
    {
        // TODO: Implement withProtocolVersion() method.
    }

    public function getHeader($name)
    {
        $headers = $this->getHeaders();

        return ($this->hasHeader($name) ? $headers[$name] : null);
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
        return $this->getData();
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function withBody(StreamInterface $body)
    {
        // TODO: Implement withBody() method.
    }

    public function getRequestTarget()
    {
        // TODO: Implement getRequestTarget() method.
    }

    public function withRequestTarget($requestTarget)
    {
        // TODO: Implement withRequestTarget() method.
    }

    public function getMethod()
    {
        return strtoupper($this->method);
    }

    public function withMethod($method)
    {
        // TODO: Implement withMethod() method.
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function withUri(UriInterface $uri, $preserveHost = false)
    {
        // TODO: Implement withUri() method.
    }

    public function getTimeout()
    {
        return $this->timeout;
    }

    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
    }

    public function getMaxRedirect()
    {
        return $this->maxRedirect;
    }

    public function setMaxRedirect($maxRedirect)
    {
        $this->maxRedirect = $maxRedirect;
    }

    public function getContext()
    {
        return $this->context;
    }

    public function setContext($context)
    {
        $this->context = $context;
    }
}
