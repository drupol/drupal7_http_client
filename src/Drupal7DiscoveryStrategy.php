<?php

namespace drupol\drupal7_http_client;

use Http\Client\HttpClient;
use Http\Discovery\Strategy\DiscoveryStrategy;
use Http\Client\Drupal7\Client as Drupal7;
use Http\Message\Drupal7\Drupal7MessageFactory as Drupal7MessageFactory;
use Http\Message\MessageFactory;

class Drupal7DiscoveryStrategy implements DiscoveryStrategy
{
    /**
     * @var array
     */
    private static $classes = [
        HttpClient::class => [
            ['class' => Drupal7::class, 'condition' => Drupal7::class],
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
