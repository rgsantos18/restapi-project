<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class BulkStoreImmunizationRequest extends FormRequest
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
             '*.patientId' => ['required','integer','exists:patients,id'],
             '*.vaccines' => ['required'],
             '*.dateAdministered' => ['required'],
             '*.administeredBy' => ['required'],
             '*.lotNumber' => ['required'],
             '*.dateNextDose' => ['required']
         ];
     }
}
