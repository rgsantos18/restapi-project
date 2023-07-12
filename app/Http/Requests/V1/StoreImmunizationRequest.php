<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreImmunizationRequest extends FormRequest
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
        // "patientId": 1,
        // "vaccines": "Astra",
        // "dateAdministered": "2019-11-12",
        // "administeredBy": "Rollin Grimes",
        // "lotNumber": 84702,
        // "dateNextDose": "2022-07-06"

        return [
            'patientId' => ['required','exists:patients,id'],
            'vaccines' => ['required'],
            'dateAdministered' => ['required'],
            'administeredBy' => ['required'],
            'lotNumber' => ['required'],
            'dateNextDose' => ['required']
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'patient_id' => $this->patientId,
            'date_administered' => $this->dateAdministered,
            'administered_by' => $this->administeredBy,
            'lot_number' => $this->lotNumber,
            'date_next_dose' => $this->dateNextDose,
        ]);
    }
}
