@extends('layouts.admin.master.master')
@section('pageTitle', 'Editar usuário')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Editar usuário</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuário</a></li>
                                <li class="breadcrumb-item active">Editar usuário</li>
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
                            <h4 class="card-title">Editar o usuário <b>{{ $user->name }}</b></h4>
                            <p class="card-title-desc">Por favor, preencha todos os campos requiridos abaixo.</p>
                            <form method="POST" action="{{ route('admin.users.update', $user->id) }}"
                                  class="app_form" autocomplete="off">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" name="image" class="form-control" id="image">
                                            <span class="text-danger image_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nome</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                   placeholder="Nome do plano" value="{{ $user->name }}">
                                            <span class="text-danger name_error"></span>
                                        </div>
                                    </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">E-mail</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"/>
                                        <span class="text-danger email_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Senha</label>
                                        <input type="password" class="form-control" id="password" name="password" />
                                        <span class="text-danger password_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirmar senha</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" />
                                        <span class="text-danger password_confirmation_error"></span>
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

