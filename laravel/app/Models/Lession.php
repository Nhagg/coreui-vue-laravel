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

    const LESSION_TYPE_LEARN = 1;
    const LESSION_TYPE_EXAM = 2;

    const LESION_TYPE = [
        self::LESSION_TYPE_LEARN, self::LESSION_TYPE_EXAM
    ];

    public $table = 'lessions';

    public $fillable = [
        'course_id',
        'name_native_language',
        'name_second_language',
        'image',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'course_id' => 'integer',
        'name_native_language' => 'string',
        'name_second_language' => 'string',
        'image' => 'string',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    protected $hidden = ['created_at', 'updated_at', 'course_id'];

    protected $with = ['course'];

    public function course()
    {
        return $this->hasOne(Course::class, 'id', 'course_id')->select('id', 'name');
    }


}
