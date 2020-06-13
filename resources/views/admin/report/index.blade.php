@extends('admin.layout.app')

@section('content')
<div class="row" style="padding: 60px 47px;">
    <div class="card" style="width: 100%;">
        <!-- /.card-header -->
        <div class="card-body" >
            <h3>Pacientes</h3>
            <form action="{{ route('reports.patients') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-success text-right" style="margin-bottom: 10px">Exportar CSV</button>
            </form>
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

        <!-- /.card-header -->
        <div class="card-body" >
            <h3 class="text-left">Unidades</h3>
            <form action="{{ route('reports.healthUnits') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-success text-right" style="margin-bottom: 10px">Exportar CSV</button>
            </form>
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

@section('scripts')
    <script>

        $('.table.table-bordered.table-striped').DataTable({
        language: {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_  resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            },
            "select": {
                "rows": {
                    "_": "Selecionado %d linhas",
                    "0": "Nenhuma linha selecionada",
                    "1": "Selecionado 1 linha"
                }
            }
        }
    });
    </script>
@endsection

