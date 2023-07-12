<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Patient;
use App\Http\Requests\V1\StorePatientRequest;
use App\Http\Requests\V1\UpdatePatientRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PatientResource;
use App\Http\Resources\V1\PatientCollection;
use App\Filters\V1\PatientFilter;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new PatientFilter();
        $queryItems = $filter->transform($request);  // [['column', 'operator', 'value']]

        $patients = Patient::where($queryItems);
        
        $includeImmunizations = $request->query('includeImmunizations');
        if($includeImmunizations) {
            $patients = $patients->with('immunizations');
        }

        return new PatientCollection($patients->paginate(10)->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    {
        return new PatientResource(Patient::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        $includeImmunizations = request()->query('includeImmunizations');
        
        if($includeImmunizations) {
            return new PatientResource($patient->loadMissing('immunizations'));
        }

        return new PatientResource($patient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientRequest  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        return $patient->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
    }
}
