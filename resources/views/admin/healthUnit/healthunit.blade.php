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
@if (Route::currentRouteName() == 'healthUnits.edit')
<div class="row">
    <div class="card-body pad">
    <form id="form-crud-noticia" enctype="multipart/form-data" action="{{ route('healthUnits.update', ['healthUnit' =>  $healthUnit->id ]) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <div class="row" style="padding: 0px 56px;">
                <div class="col-md-12 text-center mb-4">
                    <h2 style="font-weight: 700;">Editar Unidade de Saúde</h2>
                </div>
                <input type="hidden" action="/admin/healthUnits" id="ip-hf-lc">
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Nome</label>
                    <input value="{{ $healthUnit->name }}" type="text" class="form-control" id="crud-cp-name" name="name" required>
                </div>
                <div class="card-footer col-md-12 text-right mt-3">
                    <a href="{{ route('healthUnits.index') }}" type="button" id="btn-submit-crud-noticia" class="btn btn-danger">Cancelar</a>
                    <button type="submit" id="btn-submit-crud-noticia" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@else
<div class="row">
    <div class="card-body pad">
        <form id="form-crud-noticia" action="{{ route('healthUnits.store') }}/" method="POST">
            @csrf
            <div class="row" style="padding: 0px 56px;">
                <div class="col-md-12 text-center mb-4">
                    <h2 style="font-weight: 700;">Cadastro de Unidades de Saúde</h2>
                </div>
                <input type="hidden" action="/admin/healthUnits" id="ip-hf-lc">
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" id="crud-cp-name" name="name" placeholder="Digite o nome da unidade de saude..." required>
                </div>
                <div class="card-footer col-md-12 text-right mt-3">
                    <a href="/admin/healthUnits" type="button" id="btn-submit-crud-noticia" class="btn btn-danger">Cancelar</a>
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
