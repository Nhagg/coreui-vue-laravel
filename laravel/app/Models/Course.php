<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Course
 * @package App\Models
 * @version June 10, 2020, 10:41 pm UTC
 *
 * @property string $name
 * @property string $time
 */
class Course extends Model
{

    public $table = 'courses';
    



    public $fillable = [
        'name',
        'time'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
