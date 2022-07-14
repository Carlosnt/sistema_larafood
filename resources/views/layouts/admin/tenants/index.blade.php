@extends('layouts.admin.master.master')
@section('pageTitle', 'Dashbord - Empresas')
@section('content')


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Empresas</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.tenants.create') }}">Novo Empresa</a></li>
                                <li class="breadcrumb-item active">Empresas</li>
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
                            <h4 class="card-title">Gerênciamento de Empresas</h4>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <p class="card-title-desc">
                                        Aqui você pode cadastrar, editar e deletar os Empresas do sistema
                                    </p>
                                </div>

                            <div class="col-6 ">
                                <a href="{{ route('admin.tenants.create') }}" class="btn btn-success float-end"><i class="fa fa-plus-circle"></i> Novo Empresa</a>
                            </div>
                            </div>

                            <div id="selection-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table activate-select dt-responsive nowrap w-100" id="dataTablePlans">
                                            <thead>
                                            <tr>
                                                <th align="left">Imagem:</th>
                                                <th align="left">Nome:</th>
                                                <th align="center">Email:</th>
                                                <th align="center">CPF/CNPJ:</th>
                                                <th align="center">Ações:</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($tenants)
                                                @foreach($tenants as $tenant)
                                                    <tr class="odd">
                                                        <td class="sorting_1 dtr-control">
                                                            <img src="{{ $tenant->url_logo }}" class="d-flex me-3 rounded-circle img-thumbnail avatar-xs">
                                                        </td>
                                                        <td>{{ $tenant->company }}</td>
                                                        <td>{{ $tenant->email }}</td>
                                                        <td>{{ $tenant->document }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.tenants.show', $tenant->id) }}" data-method="GET" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" class="btn btn-sm btn-info j_info_modal"><i class="ri-file-search-line"></i> Detalhes</a>
                                                            <a href="{{ route('admin.tenants.edit',$tenant->id) }}" class="btn btn-sm btn-warning"><i class="ri-edit-line"></i> Editar</a>
                                                            <a href="#"  class="btn btn-sm btn-danger j_delete_modal"
                                                               data-bs-toggle="modal"
                                                               data-bs-target="#deletePlan"
                                                               data-url="{{ route('admin.tenants.destroy', $tenant->id) }}"
                                                               data-method="DELETE"
                                                               data-name="{{ $tenant->company }}"
                                                               data-id="{{ $tenant->id }}"><i class="ri-delete-bin-5-line"></i> Deletar</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
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
        <!--  Modal content for the above example -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="modalInfo" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
@endsection
@section('js')
            <script>
                $(function () {
                    //Preenche dados da janela modal de informações
                    $(".j_info_modal").click(function (e) {
                        e.preventDefault();

                        var clicked = $(this);
                        var data = clicked.data();
                        $(".modal-dialog").html("");
                        var modal = clicked.data("modal-dialog");
                        var modal = "";
                        $.ajax({
                            url: clicked.attr('href'),
                            type: clicked.data('method'),
                            data: data,
                            dataType: "json",
                            success: function (response) {
                                //message
                                if (response.error) {
                                    ajaxMessage(response.message, ajaxResponseBaseTime);
                                    $(".modal-dialog").fadeOut("fast", function () {
                                        $(".modal").fadeOut("fast");
                                    });
                                    if (response.error == true) {
                                        setTimeout(function () {
                                            window.location.reload();
                                            load.fadeOut();
                                        }, 3000);
                                    }
                                    setTimeout(function () {
                                        window.location.reload();
                                    }, 3000);
                                }
                                let html =
                                    '<div class="modal-content">\n' +
                                    '<div class="modal-header">\n' +
                                    '<h5 class="modal-title" id="staticBackdropLabel">Janela de detalhes</h5>\n' +
                                    '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>\n' +
                                    '</div>\n' +
                                    '<div id="form_delete_modal">\n' +
                                    '<div class="modal-body">\n' +
                                    '<p>Confira os detalhes do resgistro: <span id="name_modal" style="font-weight: bold"><h3>' + response.company + '</span></h3></p>\n' +
                                    '<ul>\n' +
                                    '<li><b>Plano: </b>'+response.plan.name+'</li>\n'+
                                    '<li><b>Nome: </b>'+response.company+'</li>\n'+
                                    '<li><b>E-mail: </b>'+response.email+'</li>\n'+
                                    '<li><b>CPF/CNPJ: </b>'+response.document+'</li>\n'+
                                    '<li><b>Ativo: </b>'+response.active+'</li>\n'+
                                    '</ul>\n'+
                                    '<div>\n'+
                                    '<h3>Assinatura</h3>\n'+
                                    '<ul>\n'+
                                    '<li><b>Data de assinatura: </b>'+response.subscription+' </li>\n'+
                                    '<li><b>Data expira: </b>'+response.expired_at+' </li>\n'+
                                    '<li><b>Identificador: </b>'+response.subscription_id+' </li>\n'+
                                    '<li><b>Ativo?: </b>'+response.active+' </li>\n'+
                                    '</ul>\n'+
                                    '</div>\n' +

                                    '<div class="modal-footer justify-content-center">\n' +
                                    '<button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">Fechar</button>\n' +
                                    '</div>\n' +
                                    '</div>\n' +
                                    '</div>';


                                $(".modal-dialog").append(html);
                                $(".modal-dialog").fadeIn(effecttime).css("display", "flex");
                                $(modal).fadeIn(effecttime);

                            },
                        });
                    });

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
