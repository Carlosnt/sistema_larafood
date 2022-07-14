<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TableRequest extends FormRequest
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
        return [
            'identify' => (!empty($this->request->all()['id']) ? 'required|min:3|max:255|unique:tables,identify,' . $this->request->all()['id'] : 'required|min:3|max:255|unique:tables,identify'),
            'description' => 'required|min:3|max:191'
        ];
    }
}
