@extends('admin.layout.app')

@section('css')
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('plugin/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
@endsection

@section('content')
@if (Request::is('*/edit/*'))
<div class="row">
    <div class="card-body pad">
    <form id="form-crud-noticia" enctype="multipart/form-data" action="{{ route('new.survey') }}/" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <input type="hidden" action="/admin/category/" id="ip-hf-lc">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
            <input value="{{ $categoria->name }}" type="text" class="form-control" id="crud-ct-name" name="name" placeholder="Digite o título..." required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Slug</label>
                <input value="{{ $categoria->slug }}" type="text" class="form-control" id="crud-ct-slug" name="slug" placeholder="" required>
            </div>
            <div class="form-group">
                <label>Color picker with addon:</label>

                <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                  <input value="{{ $categoria->color }}" type="text" name="color" class="form-control" data-original-title="" title="">

                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-square" style="color: {{ $categoria->color }};"></i></span>
                  </div>
                </div>
                <!-- /.input group -->
            </div>
            <div class="card-footer">
                <button type="submit" id="btn-submit-crud-noticia" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@else
<div class="row">
    <div class="card-body pad">
        <form id="form-crud-noticia" enctype="multipart/form-data" action="{{ route('patients.store') }}/" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <input type="hidden" action="/admin/category/" id="ip-hf-lc">
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" id="crud-cp-name" name="name" placeholder="Digite o título..." required>
                </div>
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Cpf</label>
                    <input type="text" class="form-control" id="crud-cp-cpf" name="cpf" placeholder="" required>
                </div>
                <div class="form-group col-md-6">
                <label for="crud-cp-material">Material</label>
                <select id="crud-cp-material" name="material_id" class="form-control">
                    <option selected>Selecione uma opção...</option>
                    <option value="">Nao sei</option>
                </select>
                </div>
                <div class="form-group col-md-6">
                <label for="crud-cp-healthUnit">Unidade de Saúde</label>
                <select id="crud-cp-healthUnit" name="health_unit_id" class="form-control">
                    <option selected>Selecione uma opção...</option>
                    <option value="">Nao sei</option>
                </select>
                </div>
                <div class="card-footer col-md-12">
                    <button type="submit" id="btn-submit-crud-noticia" class="btn btn-primary">Enviar</button>
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
