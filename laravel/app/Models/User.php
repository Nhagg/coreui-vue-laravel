<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package App\Models
 * @version June 4, 2020, 1:46 pm UTC
 *
 * @property string $user_name
 * @property string $user_email
 * @property string $user_password
 * @property integer $user_role_id
 */
class User extends Model
{
    use SoftDeletes;

    public $table = 'users';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_name',
        'user_email',
        'user_password',
        'user_role_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_name' => 'string',
        'user_email' => 'string',
        'user_password' => 'string',
        'user_role_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
