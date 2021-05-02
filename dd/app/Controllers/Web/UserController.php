<?php

namespace App\Controllers\Web;

use App\Models\User;


/**
 * Class UserController
 */
class UserController
{
    private $request, $response, $service, $app;

    /**
     * UserController constructor.
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
     * Show all users
     */
    public function index()
    {
        $users = User::get();

        $this->service->render(view('users/index.php', false), [
            'title' => __('Users'),
            'users' => $users
        ]);
    }

    /**
     * Show one user by id
     */
    public function show()
    {
        $user = User::find($this->request->id);
        if (empty($user)) {
            abort(404, (object)[
                'service' => $this->service,
                'response' => $this->response,
            ]);
        }
        $this->service->render(view('users/show.php', false), [
            'title' => __('User'),
            'user' => $user
        ]);
    }

    /**
     * View of new register
     */
    public function create()
    {

    }

    /**
     * Store data
     */
    public function store()
    {

    }

    /**
     * View for edit register
     */
    public function edit()
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