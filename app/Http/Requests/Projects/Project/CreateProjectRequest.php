<?php

namespace App\Http\Requests\Projects\Project;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'name' => 'required',
            'type' => 'required',
            'platform' => 'required',
            'client_by' => 'required',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'type.required' => 'Tipe Project harus di isi!',
            'platform.required' => 'Platform harus di isi!',
            'name.required' => 'Nama harus di isi!',
            'client_by.required' => 'Client Closing harus di isi!',
            'description.required' => 'Deskripsi harus di isi!',
        ];
    }
}
