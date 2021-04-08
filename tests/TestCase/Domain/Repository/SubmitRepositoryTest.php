<?php

namespace App\Test\TestCase\Domain\Repository;

use App\Domain\Contact\Repository\SubmitRepository;
use App\Test\Fixtures\ContactFixture;
use App\Test\Traits\AppTestTrait;
use App\Test\Traits\DatabaseTestTrait;
use PHPUnit\Framework\TestCase;


/**
 * Submit Repository Test
 */
class SubmitRepositoryTest extends TestCase
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
     * Create instance.
     *
     * @return SubmitRepository The instance
     */
    protected function createInstance(): SubmitRepository
    {
        return $this->container->get(SubmitRepository::class);
    }

    /**
     * Test insert form data.
     *
     * @return void
     */
    public function testInsertFormData(): void
    {
        $repository = $this->createInstance();

        $contactPerson = [
            'first_name' => 'Terry',
            'last_name' => 'Meyer',
            'email' => 'admin@example.com',
            'address' => 'Bubendorf',
        ];

        $this->assertTableRowCount(2, 'contact');
        $actual = $repository->insertFormData($contactPerson);

        $expected = 3;

        $this->assertSame($expected, $actual);
        $this->assertTableRowCount(3, 'contact');
    }


}
