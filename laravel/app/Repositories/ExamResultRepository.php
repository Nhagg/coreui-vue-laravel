<?php

namespace App\Repositories;

use App\Models\ExamResult;
use App\Repositories\BaseRepository;

/**
 * Class ExamResultRepository
 * @package App\Repositories
 * @version June 10, 2020, 11:00 pm UTC
*/

class ExamResultRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'exam_id',
        'user_id',
        'result',
        'start_time',
        'end_time'
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
        return ExamResult::class;
    }
}
