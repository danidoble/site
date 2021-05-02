<?php
/*
 * Created by (c)danidoble (c) 2021.
 */

namespace App\Controllers\Web;

use App\Models\PasswordReset;
use App\Models\User;

/**
 * Class IndexController
 */
class AuthController
{
    private $request, $response, $service, $app;

    /**
     * IndexController constructor.
     * @param $request
     * @param $response
     * @param $service
     * @param $app
     */
    public function __construct($request, $response, $service, $app)
    {
        $this->request = $request;
        $this->response = $response;
        $this->service = $service;
        $this->app = $app;
    }

    /**
     * Show view of login
     */
    public function show()
    {
        $flash = $this->service->flashes();
        $this->service->render(view('auth/login.php', false), [
            'title' => __('Login'),
            'flash' => $flash,
        ]);
    }

    /**
     * Login validations
     */
    public function login()
    {
        $csrf = new \ParagonIE\AntiCSRF\AntiCSRF;
        if (!empty($_POST)) {
            if ($csrf->validateRequest()) {
                $this->response->unlock();
                // Valid
                $user = User::where('email', $this->request->email)->first();
                if (empty($user)) {
                    $this->service->flash(__('Email not found'), 'error', [
                        'user' => 'Email not found'
                    ]);
                    $this->service->back();
                } else {
                    if (password_verify($this->request->param('password'), $user->password)) {
                        $this->session($user);
                        $this->response->redirect(BASE_URL, 302);
                    } else {
                        $this->service->flash(__('Incorrect password'), 'error', [
                            'password' => 'Incorrect password'
                        ]);
                        $this->service->back();
                    }
                }
                $this->response->sendHeaders(true);
                exit();
            } else {
                // Nope this is an attack, so return
                abort(403, (object)['service' => $this->service, 'response' => $this->response]);
            }
        }
    }


    public function register()
    {
        $flash = $this->service->flashes();
        $this->service->render(view('auth/register.php', false), [
            'title' => __('Register'),
            'flash' => $flash,
        ]);
    }

    public function store()
    {
        $csrf = new \ParagonIE\AntiCSRF\AntiCSRF;
        if (!empty($_POST) && $csrf->validateRequest()) {
            // Valid

            $user = User::where('email', $this->request->email)->first();
            if (!empty($user)) {
                $this->response->unlock();
                $this->service->flash(__('User email it\'s already taken'), 'error', [
                    'email' => 'Email already taken'
                ]);
                //$this->response->redirect(BASE_URL.'register', 302);
                $this->service->back();
                $this->response->sendHeaders(true);
                exit();
            }

            $user = new User();
            $user->name = $this->request->name;
            $user->last_name = $this->request->last_name;
            $user->email = $this->request->email;
            $user->password = password_hash($this->request->password, PASSWORD_DEFAULT);
            $user->save();
            $this->session($user);

            $this->response->unlock();
            $this->response->redirect(BASE_URL, 302);
            $this->response->sendHeaders(true);
            exit();
        } else {
            // Nope this is an attack, so return
            abort(403, (object)['service' => $this->service, 'response' => $this->response]);
        }

    }


    public function logout()
    {
        $csrf = new \ParagonIE\AntiCSRF\AntiCSRF;
        if (!empty($_POST) && $csrf->validateRequest()) {
            $this->response->unlock();
            // Valid
            $this->response->unlock();
            if (isset($_SESSION['user'])) {
                $user = User::find($_SESSION['user']['id']);
                $this->endSession($user);
                $this->service->flash(__('Session closed'), 'success', [
                    'user' => 'Session closed'
                ]);
                $this->response->redirect(BASE_URL, 302);
            } else {
                $this->service->flash(__('User incorrect'), 'error', [
                    'user' => 'User incorrect'
                ]);
                $this->service->back();
            }
            $this->response->sendHeaders(true);
            exit();
        } else {
            // Nope this is an attack, so return
            abort(403, (object)['service' => $this->service, 'response' => $this->response]);
        }
    }


    /**
     * @param User $user
     */
    private function session(User $user): void
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        $_SESSION['user'] = $user->toArray();
    }

    /**
     * @param User $user
     */
    private function endSession(User $user): void
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
    }


    public function recovery(){
        $flash = $this->service->flashes();
        $this->service->render(view('auth/forgot-password.php', false), [
            'title' => __('Forgot password'),
            'flash' => $flash,
        ]);
    }
    public function update(){
        $csrf = new \ParagonIE\AntiCSRF\AntiCSRF;
        if (!empty($_POST) && $csrf->validateRequest()) {
            // Valid

            $user = User::where('email', $this->request->email)->first();
            $this->response->unlock();
            if (empty($user)) {

                $this->service->flash(__('Email not found'), 'error', [
                    'user' => 'Email not found'
                ]);
                $this->service->back();
                $this->response->sendHeaders(true);
                exit();
            }

            if(env('MAIL_PASSWORD') !== null){
                $userMail = new \App\Mail\User();
                $r = $userMail->recovery($user);
                if($r == true || $r == 1){
                    $this->service->flash(__('Mail sent'), 'success', [
                        'email' => 'Mail sent'
                    ]);
                }elseif($r == false || $r == 0){
                    $this->service->flash(__('Can no\'t send email'), 'error', [
                        'email' => 'Can no\'t send email'
                    ]);
                }
            }else{
                $this->service->flash(__('You need configure mail in order to use mailing'), 'error', [
                    'email' => 'You need configure mail in order to use mailing'
                ]);
            }
            $this->service->back();
            $this->response->sendHeaders(true);

            exit();
        } else {
            // Nope this is an attack, so return
            abort(403, (object)['service' => $this->service, 'response' => $this->response]);
        }
    }


}