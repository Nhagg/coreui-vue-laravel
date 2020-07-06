<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Tracking
 * @package App\Models
 * @version July 6, 2020, 2:46 pm UTC
 *
 * @property integer $user_id
 * @property integer $learn_item_id
 * @property integer $learn_unit_id
 * @property integer $lession_id
 * @property integer $progress
 */
class Tracking extends Model
{

    const TYPE_LEARN_ITEM = 'item';
    const TYPE_LEARN_UNIT = 'unit';
    const TYPE_LESSION = 'lession';
    public $table = 'tracking';





    public $fillable = [
        'user_id',
        'learn_item_id',
        'learn_unit_id',
        'lession_id',
        'progress'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'learn_item_id' => 'integer',
        'learn_unit_id' => 'integer',
        'lession_id' => 'integer',
        'progress' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
