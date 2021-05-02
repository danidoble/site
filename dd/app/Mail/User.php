<?php
/*
 * Created by (c)danidoble Copyright (c) 2021.
 */

namespace App\Mail;
use App\Models\PasswordReset;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MailController
 * @package App\Controllers
 */
class User
{
    /**
     * @param $data
     * @return bool
     */
    public function recovery($user): bool
    {
        /**
         * Insert register in db
         */

        $recover = PasswordReset::where('email', $user->email)->first();
        if (!empty($recover)) {
            $recover->delete();
        }
        $recover = new PasswordReset();
        $recover->email = $user->email;
        $recover->token = randStr(100);
        $recover->save();


        try {
            // Create the Transport
            $transport = (new \Swift_SmtpTransport(env('MAIL_HOST', 'smtp.mailtrap.io'), env('MAIL_PORT', '2525')))
                ->setUsername(env('MAIL_USERNAME'))
                ->setPassword(env('MAIL_PASSWORD'))
                ->setEncryption(env('MAIL_ENCRYPTION', env('MAIL_ENCRYPTION')));

            // Create the Mailer using your created Transport
            $mailer = new \Swift_Mailer($transport);

            // Create a message
            $message = (new \Swift_Message(__('Reset password')))
                ->setFrom([env('MAIL_FROM_ADDRESS') => env('MAIL_FROM_NAME')])
                ->setTo($user->email);



            $template = file_get_contents(view('mails/users/recovery.html',false));

            $template = str_replace("{{ __('Reset Password') }}",__('Reset password'), $template);
            $template = str_replace("{{ __('Hey there') }}",__('Hey there') .' '.$user->name, $template);
            $template = str_replace("{{ __('Follow this link to reset the password for your account:') }}",__('Follow this link to reset the password for your account:') .' '.$user->name, $template);
            $template = str_replace("{{ ConfirmationURL }}",BASE_URL.'recovery?token='.$recover->token, $template);
            $template = str_replace("{{ mix('public/css/app.css') }}",file_get_contents(BASE_PATH.'/public/css/app.css'), $template);
            $template = str_replace("{{ env('APP_LANG') }}",env('APP_LANG'), $template);


            $message->addPart(__('Copy this url to start recovery password:').' '.BASE_URL.'recovery?token='.$recover->token, 'text/plain');
            $message->setBody($template, 'text/html');


            // Send the message
            return $mailer->send($message);
        } catch (\Exception $e) {
            showError($e);
        }
        return false;
    }
}