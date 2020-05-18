@extends('admin.layout.app')

@section('content')
<div class="row" style="padding: 60px 47px;">
    <div class="card" style="width: 100%;">
    <h3>Pacientes</h3>
        <!-- /.card-header -->
        <div class="card-body" >
            <table id="table-patients" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Cpf</th>
                    <th>Material</th>
                    <th>Unidade de Saúde</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->cpf }}</td>
                    <td>{{ $patient->nmMaterial }}</td>
                    <td>{{ $patient->nmHealthUnit }}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="card" style="width: 100%;">
    <h3>Unidades</h3>
        <!-- /.card-header -->
        <div class="card-body" >
            <table id="table-healthunit" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Pacientes</th>
                        @foreach ($materials as $material)
                            <th>{{ $material->name }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                @foreach ($healthUnits as $healthUnit)
                    <tr>
                        <td>{{ $healthUnit->name }}</td>
                        <td>{{ $healthUnit->patientsCount }}</td>
                        @foreach ($healthUnit->materialsCount as $count)
                            <td>{{ $count }}</td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
@endsection
