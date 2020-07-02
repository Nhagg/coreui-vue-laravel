<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ConversationPerson
 * @package App\Models
 * @version July 2, 2020, 12:19 am UTC
 *
 * @property string $name
 * @property integer $gender
 * @property string $avatar
 */
class ConversationPerson extends Model
{
    use SoftDeletes;

    public $table = 'conversation_persons';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'gender',
        'avatar'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'gender' => 'integer',
        'avatar' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
