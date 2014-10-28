<?php

namespace Video\WebBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CanvasControllerTest extends WebTestCase
{
    public function testAddexurl()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addExUrl');
    }

}
