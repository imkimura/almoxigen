<?php

namespace App\Http\Controllers;

use App\HealthUnit;
use App\Material;
use App\Patient;
use Illuminate\Http\Request;
use DB;
use Response;

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

    public function patients()
    {
        try {

            $patients = $this->patientModel->select('patients.id', 'patients.name', 'patients.cpf', 'm.name as nmMaterial', 'hu.name as nmHealthUnit')
                                ->join('materials as m', 'm.id', '=', 'patients.material_id')
                                ->join('health_units as hu', 'hu.id', 'patients.health_unit_id')
                                ->get();

            $headers = array(
                "Content-type" => "text/csv; charset=utf-8",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            $callback = function() use ($patients)
            {
                $file = fopen('php://output', 'w');
                fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
                fputcsv($file, array('Nome', 'CPF', 'Material', 'Unidade de Saúde'),";");

                foreach($patients as $patient) {
                    fputcsv($file, array($patient->name, $patient->cpf, $patient->nmMaterial, $patient->nmHealthUnit),";");
                }
                fclose($file);
            };

            return response()->streamDownload($callback, 'patients.csv',$headers);

        } catch (\Exception $e) {

            Log::error($e->getMessage());
            return $this->responseAPI('Erro interno do servidor', 500);

        }
    }

    public function healthUnits(Request $request)
    {
        try {

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

            $headers = array(
                "Content-type" => "text/csv; charset=utf-8",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

            $collums =  array('Nome', 'Pacientes');
            foreach($materials as $material){
                array_push($collums, $material->name);
            }

            $callback = function() use ($healthUnits, $collums)
            {
                $file = fopen('php://output', 'w');
                fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
                fputcsv($file, $collums,";");

                foreach($healthUnits as $healthUnit) {

                    $lines = array($healthUnit->name, $healthUnit->patientsCount);
                    foreach ($healthUnit->materialsCount as $count){
                        array_push($lines, $count);
                    }
                    fputcsv($file, $lines,";");
                }
                fclose($file);
            };

            return response()->streamDownload($callback, 'unidades_de_saude.csv',$headers);

        } catch (\Exception $e) {

            Log::error($e->getMessage());
            return $this->responseAPI('Erro interno do servidor', 500);

        }
    }
}
