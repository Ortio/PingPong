<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use App\Tests\FunctionalTestCase;
use GuzzleHttp\Client;

class PingPongTest extends FunctionalTestCase
{
    public function testPing(): void
    {
        $text = json_encode("Pong");
        //put your ip adress from local machine instead xxx
        $uri = "http://ххх:80";
        $client = new Client(['base_uri' => $uri]);
        $response = $client->post('/api/ping');
        $this->assertSame(200, $response->getStatusCode());
        $this->assertJson($text, $response->getBody()->getContents());
    }
}
