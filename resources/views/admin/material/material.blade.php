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
@if (Route::currentRouteName() == 'materials.edit')
<div class="row">
    <div class="card-body pad">
    <form id="form-crud-noticia" enctype="multipart/form-data" action="{{ route('materials.update', ['material' =>  $material->id ]) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <div class="row" style="padding: 0px 56px;">
                <div class="col-md-12 text-center mb-4">
                    <h2 style="font-weight: 700;">Editar Material</h2>
                </div>
                <input type="hidden" action="/admin/materials" id="ip-hf-lc">
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Nome</label>
                    <input value="{{ $material->name }}" type="text" class="form-control" id="crud-cp-name" name="name" placeholder="Digite o nome do paciente..." required>
                </div>
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Quantidade</label>
                    <input value="{{ $material->qty }}" type="text" class="form-control" id="crud-cp-cpf" name="qty" placeholder="" required>
                </div>
                <div class="card-footer col-md-12 text-right mt-3">
                    <a href="{{ route('materials.index') }}" type="button" id="btn-submit-crud-noticia" class="btn btn-danger">Cancelar</a>
                    <button type="submit" id="btn-submit-crud-noticia" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@else
<div class="row">
    <div class="card-body pad">
        <form id="form-crud-noticia" action="{{ route('materials.store') }}/" method="POST">
            @csrf
            <div class="row" style="padding: 0px 56px;">
                <div class="col-md-12 text-center mb-4">
                    <h2 style="font-weight: 700;">Cadastro de Materiais</h2>
                </div>
                <input type="hidden" action="/admin/materials" id="ip-hf-lc">
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" id="crud-cp-name" name="name" placeholder="Digite o nome do material..." required>
                </div>
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Quantidade</label>
                    <input type="text" class="form-control" id="crud-cp-qty" name="qty" placeholder="Digite a quantidade do material..." required>
                </div>
                <div class="card-footer col-md-12 text-right mt-3">
                    <a href="/admin/materials" type="button" id="btn-submit-crud-noticia" class="btn btn-danger">Cancelar</a>
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
