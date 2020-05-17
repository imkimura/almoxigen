@extends('admin.layout.app')

@section('css')
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('plugin/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <style>
        .card-footer .btn {
            width: 110px;
            color: #fff;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
@if (Route::currentRouteName() == 'patients.edit')
<div class="row">
    <div class="card-body pad">
    <form id="form-crud-noticia" enctype="multipart/form-data" action="{{ route('patients.update', ['patient' =>  $patient->id ]) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <div class="row" style="padding: 0px 56px;">
                <div class="col-md-12 text-center mb-4">
                    <h2 style="font-weight: 700;">Editar Paciente</h2>
                </div>
                <input type="hidden" action="/admin/patients" id="ip-hf-lc">
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Nome</label>
                    <input value="{{ $patient->name }}" type="text" class="form-control" id="crud-cp-name" name="name" placeholder="Digite o nome do paciente..." required>
                </div>
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Cpf</label>
                    <input value="{{ $patient->cpf }}" type="text" disabled="disabled" class="form-control" id="crud-cp-cpf" name="cpf" placeholder="" required>
                </div>
                <div class="form-group col-md-12">
                <label for="crud-cp-material">Material</label>
                <select id="crud-cp-material" name="material_id" class="form-control">
                    <option>Selecione uma opção...</option>
                    @foreach ($materials as $material)
                        @if ($material->id == $patient->material_id)
                            <option selected value="{{ $material->id }}">{{ $material->name }}</option>
                        @else
                            <option value="{{ $material->id }}">{{ $material->name }}</option>
                        @endif
                    @endforeach
                </select>
                </div>
                <div class="form-group col-md-12">
                <label for="crud-cp-healthUnit">Unidade de Saúde</label>
                    <select id="crud-cp-healthUnit" name="health_unit_id" class="form-control">
                        <option selected>Selecione uma opção...</option>
                        @foreach ($healthUnits as $healthUnit)
                            @if ($healthUnit->id == $patient->health_unit_id)
                                <option selected value="{{ $healthUnit->id }}">{{ $healthUnit->name }}</option>
                            @else
                                <option value="{{ $healthUnit->id }}">{{ $healthUnit->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="card-footer col-md-12 text-right mt-3">
                    <a href="{{ route('patients.index') }}" type="button" id="btn-submit-crud-noticia" class="btn btn-danger">Cancelar</a>
                    <button type="submit" id="btn-submit-crud-noticia" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@else
<div class="row">
    <div class="card-body pad">
        <form id="form-crud-noticia" action="{{ route('patients.store') }}/" method="POST">
            @csrf
            <div class="row" style="padding: 0px 56px;">
                <div class="col-md-12 text-center mb-4">
                    <h2 style="font-weight: 700;">Cadastro de Pacientes</h2>
                </div>
                <input type="hidden" action="/admin/patients" id="ip-hf-lc">
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" id="crud-cp-name" name="name" placeholder="Digite o nome do paciente..." required>
                </div>
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Cpf</label>
                    <input type="text" class="form-control" id="crud-cp-cpf" name="cpf" placeholder="" required>
                </div>
                <div class="form-group col-md-12">
                <label for="crud-cp-material">Material</label>
                <select id="crud-cp-material" name="material_id" class="form-control">
                    <option selected>Selecione uma opção...</option>
                    @foreach ($materials as $material)
                        <option value="{{ $material->id }}">{{ $material->name }}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-group col-md-12">
                <label for="crud-cp-healthUnit">Unidade de Saúde</label>
                    <select id="crud-cp-healthUnit" name="health_unit_id" class="form-control">
                        <option selected>Selecione uma opção...</option>
                        @foreach ($healthUnits as $healthUnit)
                            <option value="{{ $healthUnit->id }}">{{ $healthUnit->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="card-footer col-md-12 text-right mt-3">
                    <a href="/admin/patients" type="button" id="btn-submit-crud-noticia" class="btn btn-danger">Cancelar</a>
                    <button type="submit" id="btn-submit-crud-noticia" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endif
@endsection

@section('scripts')
    <!-- bootstrap color picker -->
    <script src="{{ asset('plugin/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>

    <script>

        $('#crud-ct-name').keyup(function() {
            $('#crud-ct-slug').val(slugify($('#crud-ct-name').val()))
        });

        // $('.my-colorpicker2').colorpicker()

        // $('.my-colorpicker2').on('colorpickerChange', function(event) {
        //     $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        // });
    </script>
@endsection
