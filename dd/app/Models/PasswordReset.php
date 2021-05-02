<?php
/*
 * Created by (c)danidoble Copyright (c) 2021.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as IModel;

class PasswordReset extends IModel
{

    //if you don't want 'deleted_at' in your table comment this line

    //protected $table="password_resets";
    protected $primaryKey="email";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'token',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}

