<?php

namespace Tumichnix\HaveIBeenPwned\Tests\Services\Breaches;

use Tumichnix\HaveIBeenPwned\Manager;
use Tumichnix\HaveIBeenPwned\Response;

class AccountTest extends \PHPUnit_Framework_TestCase
{
    protected $manager;

    public function setUp()
    {
        parent::setUp();
        $this->manager = new Manager();
    }

    public function testShow()
    {
        $response = $this->manager->account('test@example.com')->show();

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertInternalType('array', $response->getContent());
    }

    public function testShowWithDomain()
    {
        $response = $this->manager->account('test@example.com')->show('dropbox.com');

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertInternalType('array', $response->getContent());
        dump($response->getContent());
    }
}