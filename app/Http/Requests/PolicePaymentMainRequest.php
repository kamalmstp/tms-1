<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PolicePaymentMainRequest extends FormRequest
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
            'sector_name'   => 'required|unique:police_payment_mains,sector_name,'.$this->id,
        ];
    }
}
