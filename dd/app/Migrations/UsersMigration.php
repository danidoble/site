<?php
namespace App\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class UsersMigration{
    public function up(){
        Capsule::schema()->create('users', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(){
        Capsule::schema()->dropIfExists('users');
    }
}