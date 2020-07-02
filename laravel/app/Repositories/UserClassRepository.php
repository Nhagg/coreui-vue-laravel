<?php

namespace App\Repositories;

use App\Models\UserClass;
use App\Repositories\BaseRepository;

/**
 * Class UserClassRepository
 * @package App\Repositories
 * @version June 10, 2020, 10:49 pm UTC
*/

class UserClassRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'class_id',
        'user_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserClass::class;
    }
}
