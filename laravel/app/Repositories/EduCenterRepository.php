<?php

namespace App\Repositories;

use App\Models\EduCenter;
use App\Repositories\BaseRepository;

/**
 * Class EduCenterRepository
 * @package App\Repositories
 * @version June 10, 2020, 10:39 pm UTC
*/

class EduCenterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'center_name',
        'center_address',
        'center_phone'
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
        return EduCenter::class;
    }
}
