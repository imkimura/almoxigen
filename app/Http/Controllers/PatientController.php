<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;
use App\Patient;
use App\HealthUnit;
use App\Material;
use Log;

class PatientController extends Controller
{
    protected $model;

    public function __construct(Patient $model, Material $modelMaterial, HealthUnit $modelHealth)
    {
        $this->model = $model;
        $this->modelMaterial = $modelMaterial;
        $this->modelHealth = $modelHealth;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $patients = $this->model->select('patients.id', 'patients.name', 'patients.cpf', 'm.name as nmMaterial', 'hu.name as nmHealthUnit')
                                ->join('materials as m', 'm.id', '=', 'patients.material_id')
                                ->join('health_units as hu', 'hu.id', 'patients.health_unit_id')
                                ->get();

        return view('admin.patient.index', ['patients' => $patients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        $materials = $this->modelMaterial->all();
        $healthUnits = $this->modelHealth->all();

        return view('admin.patient.patient', [
            'materials' => $materials,
            'healthUnits' => $healthUnits
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        try {

            $patient = $this->model->fill($request->all());

            $patient->save();

            return $this->responseAPI('Paciente inserido com sucesso', 201, $patient);

        } catch (\Exception $e) {

            Log::error($e->getMessage());
            return $this->responseAPI('Erro interno do servidor', 500);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = $this->model->findOrFail($id);
        $materials = $this->modelMaterial->all();
        $healthUnits = $this->modelHealth->all();

        return view('admin.patient.patient', [
            'patient' => $patient,
            'materials' => $materials,
            'healthUnits' => $healthUnits
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $patient = $this->model->findOrFail($id);
            $patient->fill($request->all());

            $patient->save();

            return $this->responseAPI('Paciente modificado com sucesso', 201, $patient);

        } catch (\Exception $e) {

            Log::error($e->getMessage());
            return $this->responseAPI('Erro interno do servidor', 500);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $patient = $this->model->findOrFail($id);

            $patient->delete();

            return redirect()->route('patients.index')->with('alert');

        } catch (\Exception $e) {

            Log::error($e->getMessage());
            return $this->responseAPI('Erro interno do servidor', 500);

        }
    }
}
