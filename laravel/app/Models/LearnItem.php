<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class LearnItem
 * @package App\Models
 * @version June 10, 2020, 10:54 pm UTC
 *
 * @property integer $type
 * @property string $content
 * @property integer $score
 */
class LearnItem extends Model
{

    const LEARN_ITEM_TYPE_LEARN = 0;
    const LEARN_ITEM_TYPE_PRACTICE = 1;
    const LEARN_ITEM_TYPE_EXAM = 2;

    const LEAN_ITEM_TYPE = [
        self::LEARN_ITEM_TYPE_LEARN, self::LEARN_ITEM_TYPE_PRACTICE, self::LEARN_ITEM_TYPE_EXAM,
    ];

    public $table = 'learn_items';
    protected $appends = ['content'];

    public $fillable = [
        'type',
        'content',
        'score'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'string',
        'content' => 'string',
        'score' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function getContentAttribute()
    {
        $str =  $this->attributes['content'];
        return json_decode($str);
    }


}
