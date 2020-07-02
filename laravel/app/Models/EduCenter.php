<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class EduCenter
 * @package App\Models
 * @version June 10, 2020, 10:39 pm UTC
 *
 * @property integer $center_name
 * @property integer $center_address
 * @property integer $center_phone
 */
class EduCenter extends Model
{

    public $table = 'edu_centers';




    public $fillable = [
        'name',
        'address',
        'phone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'integer',
        'address' => 'integer',
        'phone' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
