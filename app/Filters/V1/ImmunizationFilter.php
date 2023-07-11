<?php

namespace App\Filters\V1;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class ImmunizationFilter extends ApiFilter {
    protected $safe_params = [
        'patientId' => ['eq'],
        'vaccines' => ['eq'],
        'dateAdministered' => ['eq','gte','gt','lt','lte'],
        'administeredBy' => ['eq'],
        'lotNumber' => ['eq','gte','gt','lt','lte'],
        'dateNextDose' => ['eq','gte','gt','lt','lte'],
    ];

    protected $column_map = [
        'dateAdministered' => 'date_administered',
        'administeredBy' => 'administered_by',
        'lotNumber' => 'lot_number',
        'dateNextDose' => 'date_next_dose',
    ];

    protected $operator_map = [
        'eq' => '=',
        'ne' => '<>',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];
}