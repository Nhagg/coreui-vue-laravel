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

    public $table = 'learn_items';
    



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
        'type' => 'integer',
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

    
}
