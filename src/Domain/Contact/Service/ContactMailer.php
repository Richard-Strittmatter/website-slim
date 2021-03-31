<?php

namespace App\Domain\Contact\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

/**
 * ContactMailer
 */
final class ContactMailer
{
    /**
     * @var MailerInterface
     */
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmail(array $viewData): void
    {
        // Send email
        $email = (new Email())
            ->from('richi.strittmatter@gmx.de')
            ->to($viewData['email'])
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('john.doe@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('This is a Test')
            ->text('Sending emails is fun again!')
            ->html('<p>fOrtNiTe</p>');

        $this->mailer->send($email);
    }
}