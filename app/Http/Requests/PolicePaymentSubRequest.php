<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PolicePaymentSubRequest extends FormRequest
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
            'sub_sector_name'   => 'required|unique:police_payment_subs,sub_sector_name,'.$this->id,
            'phone' => 'required|numeric',
        ];
    }
}
