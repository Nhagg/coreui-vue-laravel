<?php

namespace App\Repositories;

use App\Models\ExamLearnItem;
use App\Repositories\BaseRepository;

/**
 * Class ExamLearnItemRepository
 * @package App\Repositories
 * @version June 10, 2020, 10:58 pm UTC
*/

class ExamLearnItemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'exam_id',
        'learn_item_id'
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
        return ExamLearnItem::class;
    }
}
