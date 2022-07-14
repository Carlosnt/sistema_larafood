<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TenantRequest extends FormRequest
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
            'company' => (!empty($this->request->all()['id']) ? 'required|min:3|max:255|unique:tenants,company,' . $this->request->all()['id'] : 'required|min:3|max:255|unique:tenants,company'),
            'email' => (!empty($this->request->all()['id']) ? 'required|min:3|max:255|unique:tenants,email,' . $this->request->all()['id'] : 'required|min:3|max:255|unique:tenants,email'),
            'document' => (!empty($this->request->all()['id']) ? 'required||unique:tenants,document,' . $this->request->all()['id'] : 'required|unique:tenants,document'),
            'logo' => 'required|image',
            'active' => 'required|in:Y,N',

            //subscription
            'subscription' => 'nullable|date',
            'expires_at' => 'nullable|date',
            'subscription_id' => 'nullable|max:255',
            'subscription_active' => 'nullable|boolean',
            'subscription_suspended' => 'nullable|boolean',
        ];

        return $rules;
    }

}
