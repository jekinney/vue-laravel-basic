<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\FormRequest;

class RegisterForm extends FormRequest
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
            'name' => 'required|max:120',
            'email' => 'required|email|max:120|unique:users,email',
            'password' => 'required|between:6,16',
        ];
    }
}
