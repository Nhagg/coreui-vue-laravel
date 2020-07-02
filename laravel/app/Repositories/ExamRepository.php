<?php

namespace App\Repositories;

use App\Models\Exam;
use App\Repositories\BaseRepository;

/**
 * Class ExamRepository
 * @package App\Repositories
 * @version June 10, 2020, 11:02 pm UTC
*/

class ExamRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'class_id',
        'start_date',
        'end_date',
        'type',
        'duration'
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
        return Exam::class;
    }
}
