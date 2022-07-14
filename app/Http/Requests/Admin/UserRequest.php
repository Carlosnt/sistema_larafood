<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name' => ['required','string','min:3', 'max:255'],
            'email' => (!empty($this->request->all()['id']) ? 'required|min:3|max:255|unique:users,email,' . $this->request->all()['id'] : 'required|min:3|max:255|unique:users,email'),
            'password' => 'required|min:6|max:16|confirmed|different:old_password',
            'password_confirmation' => 'required|min:6|max:16',
        ];

        if($this->method() == 'PUT'){
            $rules['password'] = 'nullable|string|min:6|max:16|confirmed|different:old_password';
            $rules['password_confirmation'] = 'required|min:6';
        }
        return $rules;
    }

}
