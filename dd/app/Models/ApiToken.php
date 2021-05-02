<?php
/*
 * Created by (c)danidoble Copyright (c) 2021.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as IModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApiToken extends IModel
{
    use SoftDeletes;

    //if you don't want 'deleted_at' in your table comment this line

    //protected $table="api_tokens";
    //protected $primaryKey="id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tokenable_type',
        'tokenable_id',
        'name',
        'token',
        'abilities',
        'last_used_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'token'
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

