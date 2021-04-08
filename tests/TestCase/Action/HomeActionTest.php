<?php

namespace App\Test\TestCase\Action;

use App\Test\Traits\AppTestTrait;
use PHPUnit\Framework\TestCase;

/**
 * Home Action Test
 */
class HomeActionTest extends TestCase
{
    use AppTestTrait;

    /**
     * Test.
     *
     * @return void
     */
    public function testAction(): void
    {
        $request = $this->createRequest('GET', '/');
        $response = $this->app->handle($request);

        $this->assertStringContainsString('Willkommen', (string)$response->getBody());
        $this->assertSame(200, $response->getStatusCode());
    }
}