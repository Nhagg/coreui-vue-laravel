<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class LearnUnit
 * @package App\Models
 * @version June 10, 2020, 10:52 pm UTC
 *
 * @property integer $lession_id
 * @property integer $type
 * @property integer $name_native_language
 * @property integer $name_forgein_language
 * @property integer $learn_item_id
 */
class LearnUnit extends Model
{

    public $table = 'learn_units';
    



    public $fillable = [
        'lession_id',
        'type',
        'name_native_language',
        'name_forgein_language',
        'learn_item_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'lession_id' => 'integer',
        'type' => 'integer',
        'name_native_language' => 'integer',
        'name_forgein_language' => 'integer',
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
