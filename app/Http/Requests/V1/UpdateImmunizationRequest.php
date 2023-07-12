<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImmunizationRequest extends FormRequest
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
        $method = $this->method();

        if($method == 'PUT') {
            return [
                'patientId' => ['required','exists:patients,id'],
                'vaccines' => ['required'],
                'dateAdministered' => ['required'],
                'administeredBy' => ['required'],
                'lotNumber' => ['required'],
                'dateNextDose' => ['required']
            ];
        } else {
            return [
                'patientId' => ['sometimes','required','exists:patients,id'],
                'vaccines' => ['sometimes','required'],
                'dateAdministered' => ['sometimes','required'],
                'administeredBy' => ['sometimes','required'],
                'lotNumber' => ['sometimes','required'],
                'dateNextDose' => ['sometimes','required']
            ];   
        }
    }

    protected function prepareForValidation() {
        $requestToValidate = $this->toArray();

        $transform = [];
        $column_map = [
            'patientId' => 'patient_id',
            'dateAdministered' => 'date_administered',
            'administeredBy' => 'administered_by',
            'lotNumber' => 'lot_number',
            'dateNextDose' => 'date_next_dose',
        ];
        
        foreach ($requestToValidate as $key => $value) {
            if(isset($column_map[$key])) {
                $transform[ $column_map[$key] ] = $value;
            }
        }
        
        $this->merge($transform);
    }
}
