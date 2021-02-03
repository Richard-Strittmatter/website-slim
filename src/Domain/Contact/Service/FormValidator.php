<?php

namespace App\Domain\Contact\Service;

/**
 * FormValidator
 */
class FormValidator
{
    public function contactFormValidation(array $data): array
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

        return $errors;
    }
}