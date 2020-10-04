<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class News
 * @package App\Models
 * @version August 23, 2020, 9:57 am UTC
 *
 * @property string $short_name
 * @property string $name
 * @property string $content
 */
class News extends Model
{

    public $table = 'news';




    public $fillable = [
        'short_name',
        'type',
        'name',
        'content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'string',
        'short_name' => 'string',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
