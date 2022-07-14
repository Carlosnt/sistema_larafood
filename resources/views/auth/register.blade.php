@extends('auth.master.master')
@section('pageTitle', 'Registro | '.env('APP_NAME'))
@section('content')
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">

                <div class="text-center mt-4">
                    <div class="mb-3">
                        <a href="#" class="auth-logo">
                            <img src="{{asset('backend/assets/images/logo-dark.png')}}" height="30"
                                 class="logo-dark mx-auto" alt="">
                            <img src="{{asset('backend/assets/images/logo-light.png') }}" height="30"
                                 class="logo-light mx-auto" alt="">
                        </a>
                    </div>
                </div>

                <h4 class="text-muted text-center font-size-18"><b>{{ __('Registro') }}</b></h4>

                <div class="p-3">
                    <form class="form-horizontal mt-3" action="{{ route('web.register') }}" method="POST" name="login"
                          autocomplete="off">
                        @csrf
                        <p><b>Plano:</b> {{ session('plan')->name ?? ' Businers'}}</p>

                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control mask-cpf @error('document') is-invalid @enderror"
                                       value="{{ old('document') }}" name="document" type="text"
                                       placeholder="{{ __('CPF/CNPJ') }}">
                                <span class="text-danger error-text document_error"></span>
                            </div>

                        </div>
                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control @error('company') is-invalid @enderror"
                                       value="{{ old('company') }}" name="company" type="text"
                                       placeholder="{{ __('Nome da empresa') }}">
                                <span class="text-danger error-text company_error"></span>
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control @error('name') is-invalid @enderror"
                                       value="{{ old('name') }}" name="name" type="text"
                                       placeholder="{{ __('Nome completo') }}">
                                <span class="text-danger error-text name_error"></span>
                            </div>
                        </div>
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}" name="email" type="email"
                                           placeholder="{{ __('Email') }}">
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                            </div>



                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control @error('password') is-invalid @enderror"
                                           value="{{ (old('password')) }}" name="password" type="password"
                                           placeholder="{{ __('Senha') }}">
                                    <span class="text-danger error-text password_error"></span>
                                </div>
                            </div>
                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                       value="{{ (old('password_confirmation')) }}" name="password_confirmation" type="password"
                                       placeholder="{{ __('Repita a senha') }}">
                                <span class="text-danger error-text password_confirm_error"></span>
                            </div>
                        </div>

                            <div class="form-group mb-3 text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light"
                                            type="submit">{{ __('Cadastra-se') }}
                                    </button>
                                </div>
                            </div>

                            <div class="form-group mb-0 row mt-2">
                                <div class="col-sm-7 mt-3">
                                    @if (Route::has('web.password.request'))
                                        <a href="{{ route('web.password.request') }}" class="text-muted"><i
                                                class="mdi mdi-lock"></i> {{__('Esqueceu sua senha?')}}
                                        </a>
                                    @endif
                                </div>
                            </div>
                    </form>
                </div>
                <!-- end -->
            </div>
            <!-- end cardbody -->
        </div>
        <!-- end card -->
    </div>
@endsection
@section('js')
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var ajaxResponseBaseTime = 3;

            //Login
            $('form[name="login"]').on('submit', function (event) {
                event.preventDefault();
                var form = $(this);
                var load = $(".ajax_load");
                form.ajaxSubmit({
                    url: form.attr("action"),
                    type: "POST",
                    dataType: "json",
                    beforeSend: function () {
                        load.fadeIn(200).css("display", "flex");
                        $(document).find('span.text-danger').text('');
                    },

                    success: function (response) {
                        //redirect
                        if (response.redirect) {
                            setTimeout(function () {
                                window.location.href = response.redirect;
                            }, 3000);

                            ajaxMessage(response.message, ajaxResponseBaseTime);
                        } else {
                            form.find("input[type='file']").val(null);
                            load.fadeOut(200);
                        }

                        //message
                        if (response.message) {
                            ajaxMessage(response.message, ajaxResponseBaseTime);
                            $(".modal-dialog").fadeOut("fast", function () {
                                $(".modal-backdrop").fadeOut("fast");
                            });
                            if (response.error == true) {
                                setTimeout(function () {
                                    window.location.reload();
                                }, 3000);
                            }
                            setTimeout(function () {
                                window.location.reload();
                            }, 3000);
                        }

                        //image by fsphp mce upload
                        if (response.mce_image) {
                            $('.mce_upload').fadeOut(200);
                            tinyMCE.activeEditor.insertContent(response.mce_image);
                        }
                    },
                    complete: function () {
                        if (form.data("reset") === true) {
                            form.trigger("reset");
                        }
                    },
                    error: function (data) {
                        if (data.responseJSON) {
                            $.each(data.responseJSON.errors, function (prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                            load.fadeOut();
                        } else {
                            if (data.message) {
                                ajaxMessage(data.message, ajaxResponseBaseTime);
                            }
                            load.fadeOut();
                        }
                        ajaxMessage(ajaxResponseRequestError, 5);
                        load.fadeOut();
                    }
                });
            });

            function ajaxMessage(message, time) {
                var ajaxMessage = $(message);

                ajaxMessage.append("<div class='message_time'></div>");
                ajaxMessage.find(".message_time").animate({"width": "100%"}, time * 1000, function () {
                    $(this).parents(".message").fadeOut(200);
                });

                $(".ajax_response").append(ajaxMessage);
                ajaxMessage.effect("bounce");
            }

            $(".ajax_response .message").each(function (e, m) {
                ajaxMessage(m, ajaxResponseBaseTime += 1);
            });

            // AJAX MESSAGE CLOSE ON CLICK

            $(".ajax_response").on("click", ".message", function (e) {
                $(this).effect("bounce").fadeOut(1);
            });
        });

    </script>
@endsection
