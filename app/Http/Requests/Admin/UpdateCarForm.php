<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name' => ['required', 'string', 'min:5'],
            'mark_id' =>['required', 'exists:marks,id'],
            'user_id'=>['required', 'exists:users,id'],
            'year'=>['required','min:4', 'max:4'],
            'probig'=>['required'],
            'description'=> ['required', 'string', 'min:10'],
            'image'=>['image']

        ];
    }
}
