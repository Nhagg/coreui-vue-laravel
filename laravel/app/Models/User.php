<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use SoftDeletes;
    use HasApiTokens;

    const STATUS_ACTIVE = 1;
    const AUTH_TYPE_GOOGLE = 'google';
    public $table = 'users';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'status',
        'password',
        'username',
        'auth_type',
        'auth_id'
    ];

    public $hidden = ['created_at', 'updated_at', 'deleted_at', 'password', 'remember_token'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'status' => 'integer',
        'username' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
