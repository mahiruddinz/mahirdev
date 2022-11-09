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
            'client_id' => 'required',
            'image' => '',
            'name' => 'required',
            'type' => 'required',
            'platform' => 'required',
            'start_date' => '',
            'due_date' => '',
            'leader' => 'required',
            'description' => 'required',
            
        ];
    }
    public function messages()
    {
        return [
            'type.required' => 'Tipe Project harus di isi!',
            'platform.required' => 'Platform harus di isi!',
            'name.required' => 'Nama harus di isi!',
            'description.required' => 'Deskripsi harus di isi!',
        ];
    }
}
