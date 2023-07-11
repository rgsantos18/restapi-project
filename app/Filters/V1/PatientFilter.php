<?php

namespace App\Filters\V1;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class PatientFilter extends ApiFilter {
    protected $safe_params = [
        'name' => ['eq'],
        'birthDate' => ['eq', 'gte','gt','lt','lte'],
        'phoneNumber' => ['eq'],
        'sex' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
    ];

    protected $column_map = [
        'birthDate' => 'birth_date',
        'phoneNumber' => 'phone_number',
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