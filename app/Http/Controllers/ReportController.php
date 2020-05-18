<?php

namespace App\Http\Controllers;

use App\HealthUnit;
use App\Material;
use App\Patient;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct(HealthUnit $healthUnitModel, Material $materialModel, Patient $patientModel)
    {
        $this->healthUnitModel = $healthUnitModel;
        $this->materialModel = $materialModel;
        $this->patientModel = $patientModel;
    }

    public function index()
    {
        $patients = $this->patientModel->all();

        $patients = $patients->map(function($order) {
            $material = $this->materialModel->find($order->material_id)->first();
            $healthUnit = $this->healthUnitModel->find($order->health_unit_id)->first();

            $order->nmMaterial = $material->name;
            $order->nmHealthUnit = $healthUnit->name;

            return $order;
        });

        $healthUnits = $this->healthUnitModel->all();

        $healthUnits = $healthUnits->map(function($order) {
            $patientsCount = array();
            $materialsCount[] = array();
            $patients = $this->patientsModel;
            foreach ($patients as $patient) {
                $patientsCount[$order->health_unit_id] = ($patientsCount[$order->health_unit_id]) ? +1 : 0;
                $materialsCount[$order->health_unit_id][$order->material_id] = ($materialsCount[$order->health_unit_id][$order->material_id]) ? +1 : 0;
            }
            
            $order->patientsCount = $patientsCount;
            $order->materialsCount = $materialsCount;
            return $order;
        });

        return view('admin.report.index', ['patients' => $patients,
                                            'healthUnits' => $healthUnits]) ;
    }
}
