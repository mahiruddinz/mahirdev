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
            'email' => 'required|email',
            'join_date' => '',
            'birthdate' => '',
            'role' => 'required',
            'salary' => 'required|numeric',
            'address' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'nik.required' => 'NIK harus di isi!',
            'email.required' => 'Email harus di isi!',
            'name.required' => 'Nama harus di isi!',
            'role.required' => 'Posisi harus di isi!',
            'salary.required' => 'Gaji harus di isi!',
            'address.required' => 'Alamat harus di isi!',
        ];
    }
}