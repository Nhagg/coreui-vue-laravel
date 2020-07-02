<?php

namespace App\Repositories;

use App\Models\ConversationPerson;
use App\Repositories\BaseRepository;

/**
 * Class ConversationPersonRepository
 * @package App\Repositories
 * @version July 2, 2020, 12:19 am UTC
*/

class ConversationPersonRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'gender',
        'avatar'
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
        return ConversationPerson::class;
    }
}
