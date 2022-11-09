<?php

namespace App\Http\Requests\Projects\Project;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskProjectRequest extends FormRequest
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
            'project_id' => 'required',
            'user_id' => 'required',
            'name' => 'required',
            'target' => 'required',
            'platform' => 'required',
            'amount' => 'required',
            'description' => 'required',
            'start_time' => 'required',
            'due_time' => 'required',
            'description' => 'required',
        ];
    }
}
