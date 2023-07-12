<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immunization extends Model
{
    use HasFactory;

    // "patientId": 1,
    // "vaccines": "Astra",
    // "dateAdministered": "2019-11-12",
    // "administeredBy": "Rollin Grimes",
    // "lotNumber": 84702,
    // "dateNextDose": "2022-07-06"

    protected $fillable = [
        'patient_id',
        'vaccines',
        'date_administered',
        'administered_by',
        'lot_number',
        'date_next_dose'
    ];

    public function patients() {
        return $this->belongsTo(Patient::class);
    }
}
