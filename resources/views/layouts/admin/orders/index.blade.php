@extends('layouts.admin.master.master')
@section('pageTitle', 'Dashbord - Pedidos')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Pedidos</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Voltar</a></li>
                                <li class="breadcrumb-item active">Pedidos</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
                <div id="app" class="card">
                    <orders-tenant></orders-tenant>
                </div>

            @push('scripts-header')
                <script>
                    window.Laravel = {!! json_encode([
                    'tenantId' => auth()->check() ? auth()->user()->tenant_id : ''
                ]) !!}
                </script>
            @endpush

        </div> <!-- container-fluid -->
    </div>

@endsection
@section('js')
    <script src="{{ url('js/app.js') }}"></script>
@endsection
