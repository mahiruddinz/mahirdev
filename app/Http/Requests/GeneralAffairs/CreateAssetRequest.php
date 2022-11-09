<?php

namespace App\Http\Requests\GeneralAffairs;

use Illuminate\Foundation\Http\FormRequest;

class CreateAssetRequest extends FormRequest
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
            'location' => 'required',
            'amount' => 'required',
            'price' => 'required',
            'status' => 'required',
            'buy_date' => ''
        ];
    }
}
