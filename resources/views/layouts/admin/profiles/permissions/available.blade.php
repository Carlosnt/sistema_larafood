@extends('layouts.admin.master.master')
@section('pageTitle', 'Permissões disponíveis')
@section('content')


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Permissões disponíveis para o perfil {{ $profile->name }}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('permissions.create') }}">Nova permissão</a></li>
                                <li class="breadcrumb-item active">Permissões</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Gerênciamento de Permissões</h4>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <p class="card-title-desc">
                                        Aqui você pode ver as permissões disponíveis
                                    </p>
                                </div>

                            <div class="col-6 ">
                                <a href="{{ route('permissions.create') }}" class="btn btn-success float-end"><i class="fa fa-plus-circle"></i> Novo permissão</a>
                            </div>
                            </div>

                            <div id="selection-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table activate-select dt-responsive nowrap w-100" id="dataTablePlans">
                                            <thead>
                                            <tr>
                                                <th align="left">Nome:</th>

                                                <th align="center">Ações:</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                           <form action="" method="post">
                                               @csrf
                                               @if($permissions)
                                                   @foreach($permissions as $permission)
                                                       <tr class="odd">
                                                           <td class="sorting_1 dtr-control">
                                                               <input type="text" name="permissions[]" value="{{ $permission->id }}" /></td>
                                                           <td>{{ $permission->description }}</td>
                                                       </tr>
                                                   @endforeach
                                                   <tr>
                                                       <td>
                                                           <input type="submit" class="btn btn-success" value="Cadastrar">
                                                       </td>
                                                   </tr>
                                               @endif
                                           </form>
                                            </tbody>
                                        </table>
                                    </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    </div>
        <!-- Modal -->
        <div class="modal fade" id="deletePlan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            </div>
        </div>
@endsection
@section('js')
            <script>
                $(function () {
                // DATATABLES
                    $('#dataTablePlans').DataTable({
                        responsive: true,
                        "pageLength": 25,
                        "language": {
                            "sEmptyTable": "Nenhum registro encontrado",
                            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                            "sInfoPostFix": "",
                            "sInfoThousands": ".",
                            "sLengthMenu": "_MENU_ resultados por página",
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
                                "sSortAscending":  ": Ordenar colunas de forma ascendente",
                                "sSortDescending": ": Ordenar colunas de forma descendente"
                            }
                        },
                    });

                });

            </script>
@endsection
