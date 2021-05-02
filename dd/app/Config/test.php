<?php
/*
 * Created by (c)danidoble Copyright (c) 2021.
 */

use App\Models\User;
use App\Migrations\ApiTokensMigration;
use App\Migrations\PasswordResetsMigration;
use App\Migrations\UsersMigration;

try {
    User::first(['id', 'name', 'password', 'created_at', 'updated_at', 'deleted_at']);
} catch (\Exception $e) {
    if ($e->getCode() == '42S02') {
        $users = new UsersMigration();
        $users->down();
        $users->up();
        $pass = new PasswordResetsMigration();
        $pass->down();
        $pass->up();
        $api = new ApiTokensMigration();
        $api->down();
        $api->up();

        header('Location: ' . BASE_URL);
        exit();
    }
    showError($e);
}