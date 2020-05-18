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
                    <th style="width: 40px"></th>
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
            <!-- <tfoot>
                <tr>
                    <th>Nome</th>
                    <th>Cpf</th>
                    <th>Material</th>
                    <th>Unidade de Saúde</th>
                    <th></th>
                </tr>
            </tfoot> -->
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
                    <th>Geri-P</th>
                    <th>Geri-M</th>
                    <th>Geri-G</th>
                    <th>Geri-EG</th>
                    <th>Inf-P</th>
                    <th>Inf-M</th>
                    <th>Inf-G</th>
                    <th>Inf-EG</th>
                    <th style="width: 40px"></th>
                </tr>
            </thead>
            <tbody>
            {{ $healthUnits->materialsCount }}
            </tbody>
            <!-- <tfoot>
                <tr>
                    <th>Nome</th>
                    <th>Pacientes</th>
                    <th>Geri-P</th>
                    <th>Geri-M</th>
                    <th>Geri-G</th>
                    <th>Geri-EG</th>
                    <th>Inf-P</th>
                    <th>Inf-M</th>
                    <th>Inf-G</th>
                    <th>Inf-EG</th>
                    <th></th>
                </tr>
            </tfoot> -->
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
@endsection
