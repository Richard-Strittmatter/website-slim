<?php

namespace App\Domain\Contact\Repository;

use App\Domain\User\Data\UserData;
use App\Factory\QueryFactory;
use Cake\Database\StatementInterface;

/**
 * SubmitRepository
 */
final class SubmitRepository
{
    /**
     * @var QueryFactory The query factory
     */
    private $queryFactory;

    /**
     * The constructor.
     *
     * @param QueryFactory $queryFactory The query factory
     */
    public function __construct(QueryFactory $queryFactory)
    {
        $this->queryFactory = $queryFactory;
    }

    public function insertFormData(array $formdata):int
    {
        $values = [
            'first_name' => $formdata['first_name'],
            'last_name' => $formdata['last_name'],
            'email' => $formdata['email'],
            'address' => $formdata['address'],
        ];

        $newId = (int)$this->queryFactory->newInsert('contact', $values)
            ->execute()
            ->lastInsertId();
        return $newId;
    }
}