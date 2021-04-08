<?php

namespace App\Test\TestCase\Action;

use App\Test\Traits\AppTestTrait;
use PHPUnit\Framework\TestCase;

/**
 * Home Action Test
 */
class ContactActionTest extends TestCase
{
    use AppTestTrait;

    /**
     * Test start page
     *
     * @return void
     */
    public function testAction(): void
    {
        $request = $this->createRequest('GET', '/contact');
        $response = $this->app->handle($request);

        $this->assertStringContainsString('Kontaktseite', (string)$response->getBody());
        $this->assertSame(200, $response->getStatusCode());
    }
}