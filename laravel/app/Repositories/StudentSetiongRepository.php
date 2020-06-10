<?php

namespace App\Repositories;

use App\Models\StudentSetiong;
use App\Repositories\BaseRepository;

/**
 * Class StudentSetiongRepository
 * @package App\Repositories
 * @version June 10, 2020, 11:04 pm UTC
*/

class StudentSetiongRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'student_id',
        'speed',
        'is_view_translate'
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
        return StudentSetiong::class;
    }
}
