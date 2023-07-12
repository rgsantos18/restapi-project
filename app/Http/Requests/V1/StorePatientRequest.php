<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePatientRequest extends FormRequest
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
            'name' => ['required'],
            'birthDate' => ['required'],
            'sex' => ['required', Rule::in(['male', 'female'])],
            'phoneNumber' => ['required'],
            'email' => ['required', 'email'],
            'ethnicity' => ['sometimes'],
            'address' =>  ['required']
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'birth_date' => $this->birthDate,
            'postal_code' => $this->phoneNumber,
        ]);
    }
}
