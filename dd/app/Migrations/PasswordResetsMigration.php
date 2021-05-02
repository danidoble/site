<?php

namespace App\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class PasswordResetsMigration
{
    public function up()
    {
        Capsule::schema()->create('password_resets', function ($table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamps();
        });
    }

    public function down()
    {
        Capsule::schema()->dropIfExists('password_resets');
    }
}