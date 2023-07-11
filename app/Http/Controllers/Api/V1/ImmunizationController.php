<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Immunization;
use App\Http\Requests\StoreImmunizationRequest;
use App\Http\Requests\UpdateImmunizationRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ImmunizationResource;
use App\Http\Resources\V1\ImmunizationCollection;
use App\Filters\V1\ImmunizationFilter;
use Illuminate\Http\Request;

class ImmunizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new ImmunizationFilter();
        $queryItems = $filter->transform($request);

        $immunizations = Immunization::where($queryItems);
        return new ImmunizationCollection($immunizations->->paginate(10)->appends($request->query()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreImmunizationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImmunizationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Immunization  $immunization
     * @return \Illuminate\Http\Response
     */
    public function show(Immunization $immunization)
    {
        return new ImmunizationResource($immunization);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Immunization  $immunization
     * @return \Illuminate\Http\Response
     */
    public function edit(Immunization $immunization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateImmunizationRequest  $request
     * @param  \App\Models\Immunization  $immunization
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImmunizationRequest $request, Immunization $immunization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Immunization  $immunization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Immunization $immunization)
    {
        //
    }
}
