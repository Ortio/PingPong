<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use App\Tests\FunctionalTestCase;
use GuzzleHttp\Client;

class PingPongTest extends FunctionalTestCase
{
    const URL_ACTION = '/api/ping';

    public function testPing(): void
    {
        $text = json_encode("Pong");
        //change in env file ip params from local machine
        $uri = "http://" . $_ENV['IP'] . ":80";
        $client = new Client(['base_uri' => $uri]);
        $response = $client->post(self::URL_ACTION);
        $this->assertSame(200, $response->getStatusCode());
        $this->assertJson($text, $response->getBody()->getContents());
    }
}
