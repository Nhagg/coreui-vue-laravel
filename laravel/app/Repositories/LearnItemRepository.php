<?php

namespace App\Repositories;

use App\Models\LearnItem;
use App\Repositories\BaseRepository;

/**
 * Class LearnItemRepository
 * @package App\Repositories
 * @version June 10, 2020, 10:54 pm UTC
*/

class LearnItemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'content',
        'score'
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
        return LearnItem::class;
    }
}
