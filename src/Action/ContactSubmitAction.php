<?php

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;
use App\Domain\Contact\Service\FormValidator;

/**
 * ContactAction
 */
final class ContactSubmitAction
{
    /**
     * @var PhpRenderer
     */
    private $renderer;

    public function __construct(PhpRenderer $renderer, FormValidator $formValidator)
    {
        $this->renderer = $renderer;
        $this->FormValidator = $formValidator;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        $formdata = (array)$request->getParsedBody();

        $validationErrors = $this->FormValidator->contactFormValidation($formdata);

        $this->renderer->setLayout('layout.php');
        $viewVars = [
            'contact' => 'Kontaktseite',
            'title' => 'Kontakt',
            'formdata' => $formdata,
            'validationErrors' => $validationErrors,
        ];

        return $this->renderer->render($response, 'contact.php', $viewVars);
    }
}