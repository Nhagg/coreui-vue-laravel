<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Class
 * @package App\Models
 * @version June 10, 2020, 10:47 pm UTC
 *
 * @property integer $center_id
 * @property integer $course_id
 * @property string $name
 * @property string $start_date
 */
class Clazz extends Model
{

    public $table = 'classes';




    public $fillable = [
        'center_id',
        'course_id',
        'name',
        'start_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'center_id' => 'integer',
        'course_id' => 'integer',
        'name' => 'string',
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
