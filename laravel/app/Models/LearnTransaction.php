<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class LearnTransaction
 * @package App\Models
 * @version June 10, 2020, 10:57 pm UTC
 *
 * @property integer $user_id
 * @property integer $learn_item_id
 * @property integer $learn_result
 * @property string $start_time
 * @property string $end_time
 * @property integer $lipe_type
 */
class LearnTransaction extends Model
{

    public $table = 'learn_transactions';
    



    public $fillable = [
        'user_id',
        'learn_item_id',
        'learn_result',
        'start_time',
        'end_time',
        'lipe_type'
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
        'learn_result' => 'integer',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'lipe_type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
