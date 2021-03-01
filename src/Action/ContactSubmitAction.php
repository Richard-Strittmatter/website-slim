<?php

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;
use App\Domain\Contact\Service\Submit;
use App\Exception\ValidationException;

/**
 * ContactAction
 */
final class ContactSubmitAction
{
    /**
     * @var PhpRenderer
     */
    private $renderer;

    public function __construct(PhpRenderer $renderer, Submit $submit)
    {
        $this->renderer = $renderer;
        $this->Submit = $submit;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $formdata = (array)$request->getParsedBody();

        $this->renderer->setLayout('layout.php');
        $viewVars = [
            'contact' => 'Kontaktseite',
            'title' => 'Kontakt',
            'formdata' => $formdata,
        ];

        try {
            $lastID = $this->Submit->insertForm($formdata);
            $viewVars['lastid'] = $lastID;
        } catch (ValidationException $exception) {
            $viewVars['validationErrors'] = $exception->getErrors();
        }

        return $this->renderer->render($response, 'contact.php', $viewVars);
    }
}