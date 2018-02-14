<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'network_account' => 'required',
            'email' => 'required',
            'manager_account_name' => 'required',
            'location' => 'required',
            'job_title' => 'required',
            'date' => 'required'
        ];
    }
}
