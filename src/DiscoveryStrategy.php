<?php

namespace drupol\drupal7_http_client;

use Http\Client\Drupal7\Client as Drupal7Client;
use Http\Client\HttpClient;
use Http\Discovery\Strategy\DiscoveryStrategy as HttpDiscoveryStrategy;
use Http\Message\Drupal7\MessageFactory as Drupal7MessageFactory;
use Http\Message\MessageFactory;

/**
 * Class DiscoveryStrategy.
 *
 * @codeCoverageIgnore
 *
 * @author Pol Dellaiera <pol.dellaiera@protonmail.com>
 */
class DiscoveryStrategy implements HttpDiscoveryStrategy
{
    /**
     * @var array
     */
    private static $classes = [
        HttpClient::class => [
            ['class' => Drupal7Client::class, 'condition' => Drupal7Client::class],
        ],
        MessageFactory::class => [
            ['class' => Drupal7MessageFactory::class, 'condition' => [Drupal7MessageFactory::class]],
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public static function getCandidates($type)
    {
        if (isset(self::$classes[$type])) {
            return self::$classes[$type];
        }

        return [];
    }
}
