<?php

namespace Http\Message\Drupal7;

use GuzzleHttp\Psr7\Request as GuzzleHttpPsr7Request;
use Psr\Http\Message\RequestInterface;

/**
 * Class Request.
 *
 * @codeCoverageIgnore
 *
 * @author Pol Dellaiera <pol.dellaiera@protonmail.com>
 */
class Request extends GuzzleHttpPsr7Request implements RequestInterface
{
    /**
     * The timeout.
     *
     * @deprecated This is not implemented.
     *
     * @var float
     */
    private $timeout;

    /**
     * The max redirect.
     *
     * @deprecated This is not implemented.
     *
     * @var int
     */
    private $maxRedirect;

    /**
     * The context.
     *
     * @deprecated This is not implemented.
     *
     * @var mixed
     */
    private $context;

    /**
     * Drupal7HttpRequest constructor.
     *
     * @param string|UriInterface $uri
     *   The URI.
     * @param array $options
     *   The array of options.
     */
    public function __construct($uri, array $options = [])
    {
        // Merge the default options.
        $options += [
            'headers' => [],
            'method' => 'GET',
            'data' => null,
            'max_redirects' => 3,
            'timeout' => 30.0,
            'context' => null,
        ];

        $this->timeout = (float) $options['timeout'];
        $this->maxRedirect = $options['max_redirects'];
        $this->context = $options['context'];

        parent::__construct($options['method'], $uri, $options['headers'], $options['data']);
    }

    /**
     * Get timeout.
     *
     * @deprecated This is not implemented.
     *
     * @return float
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * Set timeout.
     *
     * @deprecated This is not implemented.
     *
     * @param $timeout
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
    }

    /**
     * Get max redirect.
     *
     * @deprecated This is not implemented.
     *
     * @return int
     */
    public function getMaxRedirect()
    {
        return $this->maxRedirect;
    }

    /**
     * Set max redirect.
     *
     * @deprecated This is not implemented.
     *
     * @param int $maxRedirect
     */
    public function setMaxRedirect($maxRedirect)
    {
        $this->maxRedirect = $maxRedirect;
    }

    /**
     * Set context.
     *
     * @deprecated This is not implemented.
     *
     * @return mixed
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Get context.
     *
     * @deprecated This is not implemented.
     *
     * @param $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }
}
