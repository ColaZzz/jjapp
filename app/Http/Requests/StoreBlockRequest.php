<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlockRequest extends FormRequest
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
        return [
            'jsonstr.platform' => 'required|between:1,25',
            'jsonstr.project' => 'required|between:1,25',
            'jsonstr.company' => 'required|between:1,55',
            'jsonstr.worker' => 'required|between:1,10',
            'jsonstr.workNumber' => 'required|between:11,11',
            'jsonstr.user' => 'required|between:1,10',
            'jsonstr.userNumber' => 'required|between:11,11',
        ];
    }
}
