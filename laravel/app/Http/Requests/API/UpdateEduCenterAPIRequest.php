<?php

namespace App\Http\Requests\API;

use App\Models\EduCenter;
use InfyOm\Generator\Request\APIRequest;

class UpdateEduCenterAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = EduCenter::$rules;
        
        return $rules;
    }
}
