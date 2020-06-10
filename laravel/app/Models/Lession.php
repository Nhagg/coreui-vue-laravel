<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Lession
 * @package App\Models
 * @version June 10, 2020, 10:43 pm UTC
 *
 * @property integer $course_id
 * @property string $lession_name_native_language
 * @property string $lession_name_second_language
 */
class Lession extends Model
{

    public $table = 'lessions';
    



    public $fillable = [
        'course_id',
        'lession_name_native_language',
        'lession_name_second_language'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'course_id' => 'integer',
        'lession_name_native_language' => 'string',
        'lession_name_second_language' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
