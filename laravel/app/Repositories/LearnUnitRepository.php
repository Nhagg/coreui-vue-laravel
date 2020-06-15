<?php

namespace App\Repositories;

use App\Models\LearnUnit;
use App\Repositories\BaseRepository;

/**
 * Class LearnUnitRepository
 * @package App\Repositories
 * @version June 10, 2020, 10:52 pm UTC
*/

class LearnUnitRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'lession_id',
        'type',
        'name_native_language',
        'name_forgein_language',
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
        return LearnUnit::class;
    }
}
