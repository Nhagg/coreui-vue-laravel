<?php

namespace App\Repositories;

use App\Models\Lession;
use App\Repositories\BaseRepository;

/**
 * Class LessionRepository
 * @package App\Repositories
 * @version June 10, 2020, 10:43 pm UTC
*/

class LessionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'course_id',
        'name_native_language',
        'name_second_language'
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
        return Lession::class;
    }
}
