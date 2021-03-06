<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->route('user')->id,
            //'email' => ['required', Rule::unique('users')->ignore($user->email)],
        ];

        if ($this->filled('password')) {
            $rules['password'] = ['confirmed', 'min:6'];
        }

        return $rules;

    }
}
