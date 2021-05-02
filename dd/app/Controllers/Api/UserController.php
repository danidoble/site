<?php
/*
 * Created by (c)danidoble (c) 2021.
 */

namespace App\Controllers\Api;

use App\Models\User;

/**
 * Class IndexController
 */
class UserController
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
     * Show all
     */
    public function index()
    {
        $users = User::get();
        $this->response->json($users);
    }

    /**
     * Show one by id
     */
    public function show()
    {
        $user = User::find($this->request->id);
        if (empty($user)) {
            abort(404, (object)[
                'service' => $this->service,
                'response' => $this->response,
            ], [
                'error' => 404,
                'errors' => [
                    'user' => 'not found',
                ]
            ]);
        }
        $this->response->json($user);
    }

    /**
     * Store data
     */
    public function store()
    {

    }

    /**
     * Update register
     */
    public function update()
    {

    }

    /**
     * Delete register
     */
    public function destroy()
    {

    }

}