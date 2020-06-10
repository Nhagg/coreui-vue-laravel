<?php

namespace App\Repositories;

use App\Models\LearnTransaction;
use App\Repositories\BaseRepository;

/**
 * Class LearnTransactionRepository
 * @package App\Repositories
 * @version June 10, 2020, 10:57 pm UTC
*/

class LearnTransactionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'learn_item_id',
        'learn_result',
        'start_time',
        'end_time',
        'lipe_type'
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
        return LearnTransaction::class;
    }
}
