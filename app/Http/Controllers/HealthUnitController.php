<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HealthUnitRequest;
use App\HealthUnit;
use Log;

class HealthUnitController extends Controller
{

    protected $model;

    public function __construct(HealthUnit $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $healthUnits = $this->model->all();

        return view('admin.healthUnit.index', ['healthUnits' => $healthUnits]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        return view('admin.healthUnit.healthUnit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HealthUnitRequest $request)
    {
        try {

            $healthUnit = $this->model->fill($request->all());

            $healthUnit->save();

            return $this->responseAPI('Unidade de Saude inserida com sucesso', 201, $healthUnit);

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
        $healthUnit = $this->model->findOrFail($id);

        return view('admin.healthUnit.healthUnit', [
            'healthUnit' => $healthUnit
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $healthUnit = $this->model->findOrFail($id);

        return $this->responseAPI('Unidade de Saude listada com sucesso!', 200, $healthUnit);
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
            $healthUnit = $this->model->findOrFail($id);
            $healthUnit->fill($request->all());

            $healthUnit->save();

            return $this->responseAPI('Unidade de Saude modificada com sucesso', 201, $healthUnit);

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
            $healthUnit = $this->model->findOrFail($id);

            $healthUnit->delete();

            return $this->responseAPI('Unidade de Saude excluida com sucesso', 200);

        } catch (\Exception $e) {

            Log::error($e->getMessage());
            return $this->responseAPI('Erro interno do servidor', 500);

        }
    }
}
