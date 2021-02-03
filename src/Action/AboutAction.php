<?php
namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;

/**
 * AboutAction
 */
final class AboutAction
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
            'about' => 'Über mich',
            'title' => 'Über mich',
        ];
        return $this->renderer->render($response, 'about.php', $viewVars);
    }
}