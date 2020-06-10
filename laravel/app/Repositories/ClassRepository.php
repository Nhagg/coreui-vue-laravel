<?php

namespace App\Repositories;

use App\Models\Class;
use App\Repositories\BaseRepository;

/**
 * Class ClassRepository
 * @package App\Repositories
 * @version June 10, 2020, 10:47 pm UTC
*/

class ClassRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'center_id',
        'course_id',
        'name',
        'start_date'
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
        return Class::class;
    }
}
