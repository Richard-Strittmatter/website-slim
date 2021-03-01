<?php

namespace App\Domain\Contact\Service;

use mysql_xdevapi\Exception;
use App\Exception\ValidationException;

/**
 * FormValidator
 */
class FormValidator
{
    public function contactFormValidation(array $data): void
    {
        $errors = [];

        if (empty($data['first_name'])){
            $errors['first_name'] = 'Input required';
        }

        if (empty($data['last_name'])){
            $errors['last_name'] = 'Input required';
        }

        if (empty($data['address'])){
            $errors['address'] = 'Please enter your address';
        }

        if ($errors){
            throw new ValidationException('Input required', $errors);
        }
    }
}