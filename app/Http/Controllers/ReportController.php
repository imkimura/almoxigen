<?php

namespace App\Http\Controllers;

use App\HealthUnit;
use App\Material;
use App\Patient;
use Illuminate\Http\Request;
use DB;

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
        $patients = $this->patientModel->select('patients.id', 'patients.name', 'patients.cpf', 'm.name as nmMaterial', 'hu.name as nmHealthUnit')
                                ->join('materials as m', 'm.id', '=', 'patients.material_id')
                                ->join('health_units as hu', 'hu.id', 'patients.health_unit_id')
                                ->get();

        $healthUnits = $this->healthUnitModel->all();
        $materials = $this->materialModel->all();

        $healthUnits = $healthUnits->map(function($order) {
            $materialsCount = array();
            $materials = $this->materialModel->all();
            $patientsCount = $order->patients->count();

            foreach($materials as $material) {
                $count = $this->patientModel->select(DB::raw('count(m.id) as cnt'))
                                            ->join('materials as m', 'm.id', '=', 'patients.material_id')
                                            ->join('health_units as hu', 'hu.id', 'patients.health_unit_id')
                                            ->where('patients.health_unit_id', $order->id)
                                            ->where('m.id', $material->id)
                                            ->groupBy('m.id')
                                            ->count();

                $materialsCount = array_merge($materialsCount, array($material->name => $count ? $count : 0));
            }
            $materialsCount = (object) $materialsCount;

            $order->patientsCount = $patientsCount;
            $order->materialsCount = $materialsCount;
            return $order;
        });

        return view('admin.report.index', ['patients' => $patients,
                                            'healthUnits' => $healthUnits,
                                            'materials' => $materials]) ;
    }
}
