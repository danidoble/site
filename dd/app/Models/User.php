<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model as IModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends IModel {
    //use SoftDeletes;

    //protected $table="users";
    //protected $primaryKey="id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'pass',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pass'
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

