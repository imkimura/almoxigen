<?php

namespace App\Http\Controllers;

use App\HealthUnit;
use App\Patient;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct(HealthUnit $healthUnitModel, Patient $patientModel)
    {
        $this->healthUnitModel = $healthUnitModel;
        $this->patientModel = $patientModel;
    }

    public function admin()
    {
        return redirect('/admin/dashboard');
    }

    public function index()
    {
        $healthUnits = $this->healthUnitModel->orderBy('updated_at', 'asc')->get();

/*        $patients = $this->patientModel->select('patients.health_unit_id', 'p.MaxDate', function($query){
                                        $query->select('health_unit_id', 'MAX(updated_at) as MaxDate')
                                            ->groupBy('health_unit_id')
                                            ->get();
                                    })
                                    ->join()
                                    ->get();

        return view('admin.index', ['healthUnits' => $healthUnits,
                                    'patients' => $patients]); */

        return view('admin.index', ['healthUnits' => $healthUnits]);

    }

    public function user()
    {
        return view('admin.users.user');
    }
}
