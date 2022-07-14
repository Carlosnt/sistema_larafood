@extends('layouts.admin.master.master')
@section('pageTitle', 'Novo usuários')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Novo usuários</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuários</a></li>
                                <li class="breadcrumb-item active">Novo perfil</li>
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
                            <h4 class="card-title">Cadastrar um novo usuário</h4>
                            <p class="card-title-desc">Por favor, preencha todos os campos requiridos abaixo.</p>
                            <form method="POST" action="{{ route('admin.users.store') }}"
                                  class="app_form" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nome</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                   placeholder="Nome do usuário">
                                            <span class="text-danger name_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                               placeholder="E-mail do usuário">
                                        <span class="text-danger email_error"></span>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Senha</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                               placeholder="Senha do usuário">
                                        <span class="text-danger password_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirmar senha</label>
                                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                                               placeholder="Confirma a senha">
                                        <span class="text-danger password_confirmation_error"></span>
                                    </div>
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

