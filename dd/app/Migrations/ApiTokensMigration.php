<?php

namespace App\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class ApiTokensMigration
{
    public function up()
    {
        Capsule::schema()->create('api_tokens', function ($table) {
            $table->bigIncrements('id');
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Capsule::schema()->dropIfExists('api_tokens');
    }
}
