<?php
/*
 * Created by (c)danidoble (c) 2021.
 */

namespace App\Controllers;

use App\Models\User;

/**
 * Class IndexController
 */
class IndexController
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
     * Home page
     */
    public function index()
    {
        $this->service->render(view('app.php', false), [
            'title' => __(env('APP_NAME', 'Double Site'))
        ]);
    }

}