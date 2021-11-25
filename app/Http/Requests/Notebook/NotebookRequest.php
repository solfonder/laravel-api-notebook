<?php

namespace App\Http\Requests\Notebook;

use Illuminate\Foundation\Http\FormRequest;

class NotebookRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'numeric|unique:Notebook,id|max:255',
            'full_name' => 'required|max:255',
            'company' => 'max:255',
            'phone' => 'required|max:255',
            'email' => 'required|email|max:255',
            'birth' => 'date',
            'image' => 'max:255'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'id.numeric' => 'must be int',
            'id.unique' => 'must be unique',
            'id.max' => 'length must be less then :max',
            'full_name.required' => 'required',
            'full_name.max' => 'length must be less then :max',
            'phone.required' => 'required',
            'phone.max' => 'length must be less then :max',
            'email.required' => 'required',
            'email.max' => 'length must be less then :max',
            'birth.date' => 'format must be YYYY-MM-DD',
            'image.max' => 'length must be less then :max'
        ];
    }
}
