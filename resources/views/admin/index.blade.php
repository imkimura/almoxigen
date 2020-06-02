@extends('admin.layout.app')

@section('content')
<div class="row" style="padding: 60px 47px;">
    <div class="card" style="width: 100%;">
        <div class="card-body" >
            <table id="table-crud-padrao" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ultima Atualização</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($healthUnits as $healthUnit)
                    <tr>
                        <td>{{ $healthUnit->name }}</td>
                        <!-- {{-- @foreach ($patients as $patient) --}}
                            {{-- @if ($patient->health_unit_id == $healthUnit->id) --}}
                                <td>{{-- $patients->updated_at --}}</td> 
                            {{-- @endif --}}
                        {{-- @endforeach --}} -->
                        <!-- isso ta uma bosta! -->
                        <td>02/06/2020<td>
                        <td>
                            <form action="" method="POST">
                                <button type="submit" class="btn btn-success text-right" style="margin-bottom: 10px">Enviar Aviso</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nome</th>
                        <th>Ultima Atualização</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection