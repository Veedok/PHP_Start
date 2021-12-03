<?php
namespace App\Test;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class userTest extends WebTestCase {

    /** @test */
    public function myTestFunction () {
        $client=static::createClient();
        $client->request('GET', '/user' );
        $this->assertResponseStatusCodeSame(200);
        $this->assertSelectorTextContains('h1', 'Controller');

    }
}