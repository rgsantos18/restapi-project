<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        $user = $this->user();

        return $user != null && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $method = $this->method();

        if($method == 'PUT') {
            return [
                'name' => ['required'],
                'birthDate' => ['required'],
                'sex' => ['required', Rule::in(['male', 'female'])],
                'phoneNumber' => ['required'],
                'email' => ['required', 'email'],
                'ethnicity' => ['sometimes','required'],
                'address' =>  ['required']
            ];
        } else {
            return [
                'name' => ['sometimes','required'],
                'birthDate' => ['sometimes','required'],
                'sex' => ['sometimes','required', Rule::in(['male', 'female'])],
                'phoneNumber' => ['sometimes','required'],
                'email' => ['sometimes','required','email'],
                'ethnicity' => ['sometimes','required'],
                'address' =>  ['sometimes','required']
            ];
        }
    }

    protected function prepareForValidation() {
        if($this->phoneNumber) {
            $this->merge([
                'phone_number' => $this->phoneNumber,
            ]);
        }
        
        if($this->birthDate) {
            $this->merge([
                'birth_date' => $this->birthDate,
            ]);
        }
    }
}
