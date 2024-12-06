<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

use Carbon\Carbon;

class MyBookingListRequest extends FormRequest
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
        $rules = [
            'barangkesenian_id'           => 'required|integer',
            'date'              => 'required|date_format:Y-m-d|after_or_equal:today',
            'alamat'           => 'required|string|max:500',
        ];


        return $rules;
    }
}
