<?php

namespace App\Http\Requests\Admin;

use App\Tenant\Rules\UniqueTenant;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            //'title' => (!empty($this->request->all()['id']) ? 'required|min:3|max:255|unique:products,title,' . $this->request->all()['id'] : 'required|min:3|max:255|unique:products,title'),
            'title' => [
                'required',
                'min:3',
                'max:255',
                new UniqueTenant('products', (!empty($this->request->all()['id']) ?? "")),
            ],
            'price' => 'required',
            'image' => 'required|image',
            'description' => 'required|min:6|max:500',
        ];

        if($this->method() == 'PUT'){
            $rules['image'] = 'nullable|image';
        }
        return $rules;
    }
}
