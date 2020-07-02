<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class StudentSetiong
 * @package App\Models
 * @version June 10, 2020, 11:04 pm UTC
 *
 * @property integer $student_id
 * @property integer $speed
 * @property boolean $is_view_translate
 */
class StudentSetting extends Model
{

    public $table = 'student_settings';




    public $fillable = [
        'student_id',
        'speed',
        'is_view_translate'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'student_id' => 'integer',
        'speed' => 'integer',
        'is_view_translate' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
