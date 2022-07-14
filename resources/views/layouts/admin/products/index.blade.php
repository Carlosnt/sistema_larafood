@extends('layouts.admin.master.master')
@section('pageTitle', 'Dashboard  - Produtos')
@section('content')


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Produtos</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.products.create') }}">Novo produto</a></li>
                                <li class="breadcrumb-item active">Produtos</li>
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
                            <h4 class="card-title">Gerênciamento de Produtos</h4>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <p class="card-title-desc">
                                        Aqui você pode cadastrar, editar e deletar os produtos do sistema
                                    </p>
                                </div>

                            <div class="col-6 ">
                                <a href="{{ route('admin.products.create') }}" class="btn btn-success float-end"><i class="fa fa-plus-circle"></i> Novo produto</a>
                            </div>
                            </div>

                            <div id="selection-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table activate-select dt-responsive nowrap w-100" id="dataTablePlans">
                                            <thead>
                                            <tr>
                                                <th align="left">Nome:</th>
                                                <th align="left">imagem:</th>
                                                <th align="center">preço:</th>
                                                <th align="center">Ações:</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($products)
                                                @foreach($products as $product)
                                                    <tr class="odd">
                                                        <td class="sorting_1 dtr-control">{{ $product->title }}</td>
                                                        <td><img class="d-flex me-3 rounded-circle img-thumbnail avatar-xs" src="{{ $product->url_image }}"></td>
                                                        <td>{{ $product->price }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.products.show', $product->id) }}" data-method="GET" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" class="btn btn-sm btn-info j_info_modal"><i class="ri-file-search-line"></i> Detalhes</a>
                                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning"><i class="ri-edit-line"></i> Editar</a>
                                                            <a href="{{ route('admin.products.categories', $product->id) }}" class="btn btn-sm btn-success"><i class="ri-price-tag-3-line"></i> Add Categoria</a>
                                                            <a href="#"  class="btn btn-sm btn-danger j_delete_modal"
                                                               data-bs-toggle="modal"
                                                               data-bs-target="#deletePlan"
                                                               data-url="{{ route('admin.products.destroy', $product->id) }}"
                                                               data-method="DELETE"
                                                               data-name="{{ $product->title }}"
                                                               data-id="{{ $product->id }}"><i class="ri-delete-bin-5-line"></i> Deletar</a>
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
                                    '<p>Confira os detalhes do resgistro: <span id="name_modal" style="font-weight: bold">' + response.title + '</span></p>\n' +
                                    '<ul>\n' +
                                    '<li><b>Nome: </b>'+response.title+'</li>\n'+
                                    '<li><b>Preço: </b>'+response.price+'</li>\n'+
                                    '<li><b>Descrição: </b>'+response.description+'</li>\n'+
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
