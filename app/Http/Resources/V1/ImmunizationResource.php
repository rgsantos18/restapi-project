<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ImmunizationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'patientId' => $this->patient_id,
            'vaccines' => $this->vaccines,
            'dateAdministered' => $this->date_administered,
            'administeredBy' => $this->administered_by,
            'lotNumber' => $this->lot_number,
            'dateNextDose' => $this->date_next_dose,
        ];
    }
}
