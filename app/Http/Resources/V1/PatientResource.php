<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
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
            'name' => $this->name,
            'birthDate' => $this->birth_date,
            'phoneNumber' => $this->phone_number,
            'sex' => $this->sex,
            'email' => $this->email,
            'address' => $this->address,
            'immunizations' => ImmunizationResource::collection($this->whenLoaded('immunizations'))
        ];
    }
}
