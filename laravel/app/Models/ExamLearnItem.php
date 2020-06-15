<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class ExamLearnItem
 * @package App\Models
 * @version June 10, 2020, 10:58 pm UTC
 *
 * @property integer $exam_id
 * @property integer $learn_item_id
 */
class ExamLearnItem extends Model
{

    public $table = 'exam_learn_items';
    



    public $fillable = [
        'exam_id',
        'learn_item_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'exam_id' => 'integer',
        'learn_item_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
