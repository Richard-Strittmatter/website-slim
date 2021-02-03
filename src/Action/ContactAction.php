<?php
namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;

/**
 * ContactAction
 */
final class ContactAction
{
    /**
     * @var PhpRenderer
     */
    private $renderer;

    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        $this->renderer->setLayout('layout.php');
        $viewVars = [
            'contact' => 'Kontaktseite',
            'title' => 'Kontakt',
        ];
        return $this->renderer->render($response, 'contact.php', $viewVars);
    }
}