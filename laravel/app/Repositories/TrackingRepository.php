<?php

namespace App\Repositories;

use App\Models\Tracking;

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

    public function all($search = [], $skip = null, $limit = null, $columns = ['*'])
    {
        $query = $this->newQuery()->where($search);
        switch ($search['type']) {
            case Tracking::TYPE_LEARN_UNIT:
                $query->with('learnUnit');
                break;
            case Tracking::TYPE_LEARN_ITEM:
                $query->with('learn_item');
                break;
            case Tracking::TYPE_LESSION:
                $query->with('lession');
                break;
        }
        return $query->get();
    }
}
