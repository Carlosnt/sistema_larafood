@extends('layouts.web.master.app')
@section('pageTitle', 'Home')
@section('content')
        <div class="text-center">
            <h1 class="title-plan">Escolha o plano</h1>
        </div>

        <div class="row">
            <div class="col-md-12">

                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('admin/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                        @else
                            <a href="{{ route('admin.login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>

            </div>
            @if($plans)
            @foreach($plans as $plan)
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable">
                    <div class="pricing-content">
                        <div class="pricingTable-header">
                            <h3 class="title">{{__($plan->name)}}</h3>
                        </div>
                        <div class="inner-content">
                            <div class="price-value">
                                <span class="currency">R$</span>
                                <span class="amount">{{ $plan->price }}</span>
                                <span class="duration">Por Mês</span>
                            </div>
                            <ul>
                                @foreach($plan->details as $detail)
                                    <li>{{ __($detail->name) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="pricingTable-signup">
                        <a href="{{ route('web.plan.subscription',$plan->url) }}">Assinar</a>
                    </div>
                </div>
            </div>
                @endforeach
                @endif


        </div>
@endsection
