<?php

namespace spec\Http\Client\Drupal7;

use GuzzleHttp\Psr7\Request;
use Http\Client\Drupal7\Client;
use PhpSpec\ObjectBehavior;
use Psr\Http\Message\ResponseInterface;

class ClientSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Client::class);
    }

    public function it_can_send_request()
    {
        require_once 'drupal7bootstrap.inc';

        $url = 'https://www.google.com';

        $request = new Request('GET', $url);

        $this->sendRequest($request)->shouldImplement(ResponseInterface::class);
        $this->sendRequest($request)->getRawRequest()->shouldBeAnInstanceOf('\StdClass');
    }
}
