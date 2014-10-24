<?php

namespace Video\WebBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FileControllerControllerTest extends WebTestCase
{
    public function testUpload()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/upload');
    }

    public function testDownload()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/download');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/delete');
    }

}
