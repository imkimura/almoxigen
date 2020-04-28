@extends('admin.layout.app')

@section('content')
<div class="row" style="padding: 60px 47px;">
    <div class="card" style="width: 100%;">
        <div class="card-header">
            <a style="float:right" class="btn btn-success" href="{{ route('patients.create') }}">Adicionar <i class="fas fa-plus-circle"></i></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body" >
            <table id="table-crud-padrao" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nome</th>
                    <th>Slug</th>
                    <th>Color</th>
                    <th style="width: 40px"></th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($categorias as $categoria) --}}
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: center;"><span style="padding: 8px 30px; border-radius: 10px; background: ;color: white;"></span></td>
                    <td><a style="font-size: 24px; color: #0552ff;" href="/admin/category/edit/">
                        <i class="fas fa-edit"></i> </a>
                        <a style="font-size: 24px; color: red;"
                            href="#confirmModal" data-id-categoria=""
                            data-toggle="modal">
                            <i class="fas fa-trash-alt"></i></a></td>
                </tr>
                {{-- @endforeach --}}
            </tbody>
            <tfoot>
                <tr>
                    <th>id</th>
                    <th>Nome</th>
                    <th>Slug</th>
                    <th>Color</th>
                    <th></th>
                </tr>
            </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- Modal HTML -->
<div id="confirmModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box" style="font-size: 25px; color: red;">
                    <i class="fas fa-exclamation-circle">&nbsp;&nbsp;</i>
                </div>
                <h4 class="modal-title">Você tem certeza?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Você realmente deseja excluir esta Categoria? O processo não pode ser desfeito.</p>
            </div>
            <div class="modal-footer">
                <form action="." id="form-delete-categoria" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                    <button type="submit" role="button" class="btn btn-danger">Deletar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@if (session('alert'))
<script>
toastr.error('Operação não pode ser concluída com sucesso.')
</script>

@endif

@section('scripts')
    <script>
        $('#confirmModal').on('show.bs.modal', function(e) {
            var idCategoria = $(e.relatedTarget).data('id-categoria');
            $('#form-delete-categoria').attr('action', '/admin/categories/delete/' + idCategoria);
        });
        $('#table-crud-padrao').DataTable({
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
