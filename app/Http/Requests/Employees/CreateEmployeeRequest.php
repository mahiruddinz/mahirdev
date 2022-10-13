<?php

namespace App\Http\Requests\Employees;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
            'nik' => 'required',
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4',
            'role' => 'required',
            'join_date' => 'required',
            'salary' => 'required|numeric',
            'address' => 'required',
            'npwp' => 'required',

        ];
    }
}