<?php

namespace App\Mail;
/**
 * Class MailController
 * @package App\Controllers
 */
class Test
{
    /**
     * @param $data
     * @return bool
     */
    public function test($data): bool
    {
        // Create the Transport
        $transport = (new \Swift_SmtpTransport('smtp.example.org', env('MAIL_PORT', '2525')))
            ->setUsername(env('MAIL_USERNAME'))
            ->setPassword(env('MAIL_PASSWORD'));

        // Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

        // Create a message
        $message = (new \Swift_Message($data->subject))
            ->setFrom([env('MAIL_FROM_ADDRESS') => env('MAIL_FROM_NAME')])
            ->setTo($data->to)
            ->setBody('Test message');

        // Send the message
        try {
            return $mailer->send($message);
        } catch (\Exception $e) {
            showError($e);
        }
        return false;
    }
}