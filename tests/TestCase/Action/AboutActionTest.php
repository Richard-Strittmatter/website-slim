<?php

namespace App\Test\tests\TestCase\Action;

use App\Action\AboutAction;
use App\Test\Traits\AppTestTrait;
use PHPUnit\Framework\TestCase;
use function DI\string;

/**
 * About Action Test
 */
class AboutActionTest extends TestCase
{
    use AppTestTrait;

    /**
     * Test about page
     *
     * @return void
     */
    public function testAction(): void
    {
        $request = $this->createRequest('GET', '/about');
        $response = $this->app->handle($request);

        $this->assertStringContainsString('Mein Name ist Richard Strittmatter', (string)$response->getBody());
        $this->assertSame(200, $response->getStatusCode());
    }

}
