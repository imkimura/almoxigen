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
        return view('admin.report.index');
    }
}
