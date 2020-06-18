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
    const LEARN_UNIT_TYPE_VOCABURARY = 'vocaburary';
    const LEARN_UNIT_TYPE_GRAMMAR = 'grammar';
    const LEARN_UNIT_TYPE_CONVERSATION = 'conversation';
    const LEARN_UNIT_TYPE_PRACTICE = 'practice';
    const LEARN_UNIT_TYPE_EXAM = 'exam';

    const LEARN_UNIT_TYPE = [
        self::LEARN_UNIT_TYPE_VOCABURARY,
        self::LEARN_UNIT_TYPE_GRAMMAR,
        self::LEARN_UNIT_TYPE_CONVERSATION,
        self::LEARN_UNIT_TYPE_PRACTICE,
        self::LEARN_UNIT_TYPE_EXAM,
    ];
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
        'type' => 'string',
        'name_native_language' => 'string',
        'name_forgein_language' => 'string',
        'learn_item_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    protected $hidden = ['created_at', 'updated_at', 'lession_id', 'learn_item_id'];

    protected $with = ['lession', 'learnItems'];

    public function lession()
    {
        return $this->hasOne(Lession::class, 'id', 'lession_id');
    }


    public function learnItems()
    {
        return $this->hasMany(LearnItem::class, 'learn_unit_id','id');
    }


}
