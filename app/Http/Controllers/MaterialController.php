<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MaterialRequest;
use App\Material;
use Log;

class MaterialController extends Controller
{

    protected $model;

    public function __construct(Material $model)
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
        $materials = $this->model->all();

        return view('admin.material.index', ['materials' => $materials]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        return view('admin.material.material');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaterialRequest $request)
    {
        try {

            $material = $this->model->fill($request->all());

            $material->save();

            return $this->responseAPI('Material inserido com sucesso', 201, $material);

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
        $materials = $this->model->findOrFail($id);

        return view('admin.material.material', [
            'material' => $materials
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
        $material = $this->model->findOrFail($id);

        return $this->responseAPI('Paciente listado com sucesso!', 200, $material);
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
            $material = $this->model->findOrFail($id);
            $material->fill($request->all());

            $material->save();

            return $this->responseAPI('Material modificado com sucesso', 201, $material);

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
            $material = $this->model->findOrFail($id);

            $material->delete();

            return $this->responseAPI('Material excluido com sucesso', 200);

        } catch (\Exception $e) {

            Log::error($e->getMessage());
            return $this->responseAPI('Erro interno do servidor', 500);

        }
    }
}
