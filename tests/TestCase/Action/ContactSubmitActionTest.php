<?php

namespace App\Test\TestCase\Action;

use App\Action\ContactSubmitAction;
use App\Test\Fixtures\ContactFixture;
use App\Test\Traits\AppTestTrait;
use App\Test\Traits\DatabaseTestTrait;
use PHPUnit\Framework\TestCase;

/**
 * ContactSubmitActionTest
 */
class ContactSubmitActionTest extends TestCase
{
    use AppTestTrait;
    use DatabaseTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        ContactFixture::class,
    ];

    /**
     * Test Invoke
     *
     * @return void
     */
    public function testContactSubmitAction(): void
    {
        $data = [
            'first_name' => 'Terry',
            'last_name' => 'Meyer',
            'email' => 'admin@example.com',
            'address' => 'Bubendorf',
        ];
        $request = $this->createRequest('POST', '/contact')->withParsedBody($data);
        $response = $this->app->handle($request);

        $this->assertStringContainsString('3</div>',
            (string)$response->getBody());
        $this->assertSame(200, $response->getStatusCode());
    }

}
