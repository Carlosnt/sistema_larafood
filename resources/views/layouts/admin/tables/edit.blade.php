@extends('layouts.admin.master.master')
@section('pageTitle', 'Dashboard - Editar mesa')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Editar mesa</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.tables.index') }}">Mesas</a></li>
                                <li class="breadcrumb-item active">Editar mesa</li>
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
                            <h4 class="card-title">Editar o usuário <b>{{ $table->identify }}</b></h4>
                            <p class="card-title-desc">Por favor, preencha todos os campos requiridos abaixo.</p>
                            <form method="POST" action="{{ route('admin.tables.update', $table->id) }}"
                                  class="app_form" autocomplete="off">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="id" value="{{ $table->id }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="identify" class="form-label">Nome</label>
                                            <input type="text" name="identify" class="form-control" id="identify"
                                                   placeholder="Nome do plano" value="{{ $table->identify }}">
                                            <span class="text-danger identify_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Descrição</label>
                                        <textarea class="form-control" id="description" rows="4" name="description">{{ $table->description }}</textarea>
                                        <span class="text-danger description_error"></span>
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

