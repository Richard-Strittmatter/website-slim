<?php

namespace App\Exception;

use Throwable;
use RuntimeException;

/**
 * ValidationException
 */
final class ValidationException extends RuntimeException
{
    /**
     * @var array
     */
    private $errors;

    public function __construct(
        string $message,
        array $errors = [],
        int $code = 422,
        Throwable $previous = null
    ){
        parent::__construct($message, $code, $previous);

        $this->errors = $errors;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}