<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter {
    protected $safe_params =[];
    protected $column_map = [];
    protected $operator_map = [];

    public function transform(Request $request) {
        $eloQuery = [];

        foreach($this->safe_params as $param => $operators) {
            $query = $request->query($param);

            $column = $this->column_map[$param] ?? $param;
            
            foreach($operators as $operator) {
                if(isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operator_map[$operator], $query[$operator]]; // [[column, operator, value]]
                }
            }
        }

        return $eloQuery;
    }
}