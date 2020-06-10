<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Exam
 * @package App\Models
 * @version June 10, 2020, 11:02 pm UTC
 *
 * @property integer $class_id
 * @property string $start_date
 * @property string $end_date
 * @property integer $type
 * @property integer $duration
 */
class Exam extends Model
{

    public $table = 'exams';
    



    public $fillable = [
        'class_id',
        'start_date',
        'end_date',
        'type',
        'duration'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'class_id' => 'integer',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'type' => 'integer',
        'duration' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
