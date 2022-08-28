<?php

namespace App\Http\Requests\Admin;

use App\Tenant\Rules\UniqueTenant;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            //'name' => (!empty($this->request->all()['id']) ? 'required|min:3|max:255|unique:categories,name,' . $this->request->all()['id'] : 'required|min:3|max:255|unique:categories,name'),
            "name" =>[
                'required',
                'min:3',
                'max:255',
                new UniqueTenant('categories', (!empty($this->request->all()['id']) ?? "")),
            ],
            'description' => 'required|min:3|max:10000'
        ];
    }
}
