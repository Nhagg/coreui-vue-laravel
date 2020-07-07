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

    const TYPE_LEARN_ITEM = 'learn_item';
    const TYPE_LEARN_UNIT = 'learn_unit';
    const TYPE_LESSION = 'lession';
    public $table = 'tracking';


    public $fillable = [
        'user_id',
        'learn_item_id',
        'learn_unit_id',
        'lession_id',
        'progress',
        'type'
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
        'progress' => 'integer',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function learnUnit()
    {
        return $this->hasOne(LearnUnit::class, 'id', 'learn_unit_id')->without('learnItems')->select('id', 'type', 'name_native_language', 'name_forgein_language');
    }

    public function learnItem()
    {
        return $this->hasOne(LearnItem::class, 'id', 'learn_item_id');
    }

    public function lession()
    {
        return $this->hasOne(Lession::class, 'id', 'lession_id');
    }

}
