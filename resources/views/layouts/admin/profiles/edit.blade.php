@extends('layouts.admin.master.master')
@section('pageTitle', 'Novo plano')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Editar plano</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
                                <li class="breadcrumb-item active">Editar plano</li>
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
                            <h4 class="card-title">Editar o plano <b>{{ $plan->name }}</b></h4>
                            <p class="card-title-desc">Por favor, preencha todos os campos requiridos abaixo.</p>
                            <form method="POST" action="{{ route('plans.update', $plan) }}"
                                  class="app_form" autocomplete="off">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="id" value="{{ $plan->id }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nome</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                   placeholder="Nome do plano" value="{{ $plan->name }}">
                                            <span class="text-danger name_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Preço</label>
                                            <input type="text" name="price" class="form-control mask-money" value="{{ $plan->price }}" id="price"
                                                  >
                                            <span class="text-danger price_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Descrição</label>
                                        <textarea class="form-select" id="description" name="description"
                                                  rows="4">{{ $plan->description }}</textarea>

                                    </div>
                                </div>

                                <div>
                                    <button class="btn btn-primary" type="submit">Cadastrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection

