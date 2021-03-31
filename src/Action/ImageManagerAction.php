<?php

namespace App\Action;

use Intervention\Image\ImageManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Psr7\Factory\StreamFactory;

/**
 * ImageManagerAction
 */
final class ImageManagerAction
{
    /**
     * @var ImageManager
     */
    private $imageManager;

    public function __construct(ImageManager $imageManager)
    {
        $this->imageManager = $imageManager;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        // Create image in memory
        $image = $this->imageManager->canvas(800, 600, '#719e40');

        // Encode image into given format (PNG) and quality (100%)
        $data = $image->encode('png', 100)->getEncoded();

        // Detect and set the correct content-type, e.g. image/png
        $mime = finfo_buffer(finfo_open(FILEINFO_MIME_TYPE), $data);
        $response = $response->withHeader('Content-Type', $mime);

        // Output image as stream
        return $response->withBody((new StreamFactory())->createStream($data));
    }
}