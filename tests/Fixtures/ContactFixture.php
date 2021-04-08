<?php

namespace App\Test\Fixtures;

/**
 * Fixture.
 */
class ContactFixture
{
    /** @var string Table name */
    public $table = 'contact';

    /**
     * Records.
     *
     * @var array Records
     */
    public $records = [
        [
            'contactId' => 1,
            'first_name' => 'Terry',
            'last_name' => 'Meyer',
            'email' => 'admin@example.com',
            'address' => 'Bubendorf',
        ],
        [
            'contactId' => 2,
            'first_name' => 'Richi',
            'last_name' => 'Mueller',
            'email' => 'test@example.com',
            'address' => 'yemen',
        ],
    ];
}