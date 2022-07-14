@extends('layouts.admin.master.master')
@section('pageTitle', 'Ediçaõ do detalhe do plano')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edição de detalhe do plano <span class="text-danger">{{ $plan->name }}</span> </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.details.plan.index',[$plan->url]) }}">Detalhes do planos</a></li>
                                <li class="breadcrumb-item active">Novo plano</li>
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
                            <h4 class="card-title">Atualização do detalhe</h4>
                            <p class="card-title-desc">Por favor, preencha todos os campos requiridos abaixo.</p>
                            <form method="POST" action="{{ route('admin.details.plan.update',[$plan->url, $detail->id]) }}"
                                  class="app_form" autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <input type="hidden" value="{{ $detail->id }}" name="id">
                                            <label for="name" class="form-label">Nome</label>
                                            <input type="text" name="name" class="form-control"  value="{{ $detail->name }}" id="name"
                                                   placeholder="Nome do plano">
                                            <span class="text-danger name_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <button class="btn btn-primary" type="submit">Atualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection

