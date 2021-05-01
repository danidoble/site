<?php

use App\Models\User;

try {
    User::first(['id', 'name', 'password', 'created_at', 'updated_at', 'deleted_at']);
} catch (\Exception $e) {
    if ($e->getCode() == '42S02') {
        $migration = new App\Migrations\UsersMigration();
        $migration->up();
        header('Location: ' . BASE_URL);
        exit();
    }
    showError($e);
}