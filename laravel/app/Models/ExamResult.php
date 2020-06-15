<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class ExamResult
 * @package App\Models
 * @version June 10, 2020, 11:00 pm UTC
 *
 * @property integer $exam_id
 * @property integer $user_id
 * @property integer $result
 * @property string $start_time
 * @property string $end_time
 */
class ExamResult extends Model
{

    public $table = 'exam_results';
    



    public $fillable = [
        'exam_id',
        'user_id',
        'result',
        'start_time',
        'end_time'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'exam_id' => 'integer',
        'user_id' => 'integer',
        'result' => 'integer',
        'start_time' => 'datetime',
        'end_time' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
