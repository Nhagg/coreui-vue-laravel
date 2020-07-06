<?php

namespace App\Repositories;

use App\Models\Tracking;
use App\Repositories\BaseRepository;

/**
 * Class TrackingRepository
 * @package App\Repositories
 * @version July 6, 2020, 2:46 pm UTC
*/

class TrackingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'learn_item_id',
        'learn_unit_id',
        'lession_id',
        'progress',
        'type'
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
        return Tracking::class;
    }
}
