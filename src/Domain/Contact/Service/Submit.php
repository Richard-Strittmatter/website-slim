<?php

namespace App\Domain\Contact\Service;

use App\Domain\Contact\Repository\SubmitRepository;
use App\Domain\Contact\Service\FormValidator;
/**
 * Submit
 */
class Submit
{
    /**
     * @var SubmitRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param SubmitRepository $repository The repository
     */
    public function __construct(SubmitRepository $repository, FormValidator $formValidator)
    {
        $this->repository = $repository;
        $this->FormValidator = $formValidator;

    }

    public function insertForm(array $formdata): int
    {
        $this->FormValidator->contactFormValidation($formdata);
        // Insert Form

        return $this->repository->insertFormData($formdata);
    }
}