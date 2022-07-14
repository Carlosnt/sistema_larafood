@extends('layouts.admin.master.master')
@section('pageTitle', 'Dashboard - Editar produto')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Editar produto</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Produtos</a></li>
                                <li class="breadcrumb-item active">Editar produto</li>
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
                            <h4 class="card-title">Editar o produto <b>{{ $product->title }}</b></h4>
                            <p class="card-title-desc">Por favor, preencha todos os campos requiridos abaixo.</p>
                            <form method="POST" action="{{ route('admin.products.update', $product->id) }}"
                                  class="app_form" autocomplete="off" enctype="multipart/form-data" accept="*image">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Imagem</label>
                                            <input type="file" name="image" class="form-control" id="image">
                                            <span class="text-danger image_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Nome</label>
                                            <input type="text" name="title" class="form-control" id="title"
                                                   value="{{ $product->title }}">
                                            <span class="text-danger title_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Preço</label>
                                            <input type="text" name="price" class="form-control mask-money" id="price"
                                                   value="{{ $product->price }}">
                                            <span class="text-danger price_error"></span>
                                        </div>
                                    </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Descrição</label>
                                        <textarea class="form-control" id="description" rows="4" name="description">{{ $product->description }}</textarea>
                                        <span class="text-danger description_error"></span>
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

