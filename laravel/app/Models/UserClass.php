<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class UserClass
 * @package App\Models
 * @version June 10, 2020, 10:49 pm UTC
 *
 * @property integer $class_id
 * @property integer $user_id
 */
class UserClass extends Model
{

    public $table = 'user_classes';
    



    public $fillable = [
        'class_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'class_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
