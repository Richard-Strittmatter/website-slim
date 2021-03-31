<?php

namespace App\Action;

use App\Domain\Contact\Service\ContactMailer;
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
    /**
     * @var Submit
     */
    private $submit;

    /**
     * Contact Mailer
     * @var ContactMailer
     */
    private $mailer;

    public function __construct(PhpRenderer $renderer, Submit $submit, ContactMailer $mailer)
    {
        $this->renderer = $renderer;
        $this->submit = $submit;
        $this->mailer = $mailer;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $formdata = (array)$request->getParsedBody();

        $this->renderer->setLayout('layout.php');
        $viewVars = [
            'contact' => 'Kontaktseite',
            'title' => 'Kontakt',
            'formData' => $formdata,
        ];

        try {
            $lastID = $this->submit->insertForm($formdata);
            $viewVars['lastid'] = $lastID;
            $this->mailer->sendEmail($viewVars['formData']);
        } catch (ValidationException $exception) {
            $viewVars['validationErrors'] = $exception->getErrors();
        }

        return $this->renderer->render($response, 'contact.php', $viewVars);
    }
}