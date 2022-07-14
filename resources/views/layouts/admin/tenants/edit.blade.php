@extends('layouts.admin.master.master')
@section('pageTitle', 'Editar Empresa')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Editar empresa</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.tenants.index') }}">Empresas</a></li>
                                <li class="breadcrumb-item active">Editar empresa</li>
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
                            <h4 class="card-title">Editar o usuário <b>{{ $tenant->name }}</b></h4>
                            <p class="card-title-desc">Por favor, preencha todos os campos requiridos abaixo.</p>
                            <form method="POST" action="{{ route('admin.tenants.update', $tenant->id) }}"
                                  class="app_form" autocomplete="off">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="id" value="{{ $tenant->id }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="logo" class="form-label">Logo</label>
                                            <input type="file" name="logo" class="form-control" id="logo">
                                            <span class="text-danger logo_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="company" class="form-label">Nome</label>
                                            <input type="text" name="company" class="form-control" id="company"
                                                   placeholder="Nome da empresa" value="{{ $tenant->company }}">
                                            <span class="text-danger company_error"></span>
                                        </div>
                                    </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">E-mail</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $tenant->email }}"/>
                                        <span class="text-danger email_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="document" class="form-label">CPF/CNPJ</label>
                                        <input type="text" value="{{ $tenant->document }}" class="form-control" id="document" name="document" />
                                        <span class="text-danger document_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="active" class="form-label">Ativo?</label>
                                        <select  class="form-control" id="active" name="active">
                                        <option value="Y" {{ ($tenant->active === "Y" ? "selected" : "") }}>Sim</option>
                                        <option value="N" {{ ($tenant->active === "N" ? "selected" : "") }}>Não</option>
                                        </select>
                                        <span class="text-danger active_error"></span>
                                    </div>
                                </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <h4 class="card-title">Assinatura</h4>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="subscription" class="form-label">Data da assinatura</label>
                                            <input type="date" value="{{ $tenant->subscription }}" class="form-control" id="subscription" name="subscription" />
                                            <span class="text-danger subscription_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="expired_at" class="form-label">Expira(Final)</label>
                                            <input type="date" value="{{ $tenant->expired_at }}" class="form-control" id="expired_at" name="expired_at" />
                                            <span class="text-danger expired_at_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="subscription_id" class="form-label">Identificador</label>
                                            <input type="text" value="{{ $tenant->subscription_id }}" class="form-control" id="subscription_id" name="subscription_id" />
                                            <span class="text-danger subscription_id_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="active" class="form-label">Ativo?</label>
                                            <select  class="form-control" id="active" name="active">
                                                <option value="Y" {{ ($tenant->subscription_active == 1 ? "selected" : "") }}>Sim</option>
                                                <option value="N" {{ ($tenant->subscription_active == 0 ? "selected" : "") }}>Não</option>
                                            </select>
                                            <span class="text-danger active_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="active" class="form-label">Ativo?</label>
                                            <select  class="form-control" id="active" name="active">
                                                <option value="Y" {{ ($tenant->subscription_suspended == 1 ? "selected" : "") }}>Sim</option>
                                                <option value="N" {{ ($tenant->subscription_suspended == 0 ? "selected" : "") }}>Não</option>
                                            </select>
                                            <span class="text-danger active_error"></span>
                                        </div>
                                    </div>
                                <div>
                                    <button class="btn btn-primary" type="submit">Atualizar</button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection

