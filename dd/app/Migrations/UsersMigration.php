<?php

namespace App\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class UsersMigration
{
    public function up()
    {
        Capsule::schema()->create('users', function ($table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            //$table->rememberToken();
            $table->text('profile_photo_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Capsule::schema()->dropIfExists('users');
    }
}
