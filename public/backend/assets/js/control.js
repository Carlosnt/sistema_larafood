$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var ajaxResponseBaseTime = 3;
    var ajaxResponseRequestError = "<div class='message error icon-warning'>Desculpe mas não foi possível processar sua requisição...</div>";

    // MOBILE MENU

    $(".mobile_menu").click(function (e) {
        e.preventDefault();

        var menu = $(".dash_sidebar");
        menu.animate({right: 0}, 200, function (e) {
            $("body").css("overflow", "hidden");
        });

        menu.one("mouseleave", function () {
            $(this).animate({right: '-260'}, 200, function (e) {
                $("body").css("overflow", "auto");
            });
        });
    });

    $('.filtro').click(function () {
        $('.mostraFiltro').slideToggle();
        $(this).toggleClass('active');
        return false;
    });

    $(".j_filter_open").on("click", function (e) {
        e.preventDefault();
        $('.j_filter_show').slideToggle();
        $(this).toggleClass('active');
        return false;
    });

    //NOTIFICATION CENTER
    function notificationsCount() {
        var center = $(".notification_center_open");
        $.post(center.data("count"), function (response) {
            if (response.count) {
                center.html(response.count);
            } else {
                center.html("0");
            }
        }, "json");
    }

    function notificationHtml(link, image, notify, date) {
        return '<div data-notificationlink="' + link + '" class="notification_center_item radius transition">\n' +
                '    <div class="image">\n' +
                '        <img class="rounded" src="' + image + '"/>\n' +
                '    </div>\n' +
                '    <div class="info">\n' +
                '        <p class="title">' + notify + '</p>\n' +
                '        <p class="time icon-clock-o">' + date + '</p>\n' +
                '    </div>\n' +
                '</div>';
    }

    notificationsCount();

    setInterval(function () {
        notificationsCount();
    }, 1000 * 50);

    $(".notification_center_open").click(function (e) {
        e.preventDefault();

        var notify = $(this).data("notify");
        var center = $(".notification_center");

        $.post(notify, function (response) {
            if (response.message) {
                ajaxMessage(response.message, ajaxResponseBaseTime);
            }

            var centerHtml = "";
            if (response.notifications) {
                $.each(response.notifications, function (e, notify) {
                    centerHtml += notificationHtml(notify.link, notify.image, notify.title, notify.created_at);
                });

                center.html(centerHtml);

                center.css("display", "block").animate({right: 0}, 200, function (e) {
                    $("body").css("overflow", "hidden");
                });
            }
        }, "json");

        center.one("mouseleave", function () {
            $(this).animate({right: '-320'}, 200, function (e) {
                $("body").css("overflow", "auto");
                $(this).css("display", "none");
            });
        });

        notificationsCount();
    });

    $(".notification_center").on("click", "[data-notificationlink]", function () {
        window.location.href = $(this).data("notificationlink");
    });

    //DATA SET
    $("[data-post]").click(function (e) {
        e.preventDefault();

        var clicked = $(this);
        var data = clicked.data();
        var load = $(".ajax_load");

        if (data.confirm) {
            var deleteConfirm = confirm(data.confirm);
            if (!deleteConfirm) {
                return;
            }
        }

        $.ajax({
            url: data.post,
            type: "POST",
            data: data,
            dataType: "json",
            beforeSend: function () {
                load.fadeIn(200).css("display", "flex");
                $(document).find('span.text-danger').text('');
            },
            success: function (response) {
                if (response.errors) {
                    $.each(response.responseJSON.errors, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    clicked.reset();
                    if (response.message) {
                        ajaxMessage(response.message, ajaxResponseBaseTime);
                    }
                }

                //redirect
                if (response.redirect) {
                    window.location.href = response.redirect;
                } else {
                    load.fadeOut(200);
                }

                //reload
                if (response.reload) {
                    window.location.reload();
                } else {
                    load.fadeOut(200);
                }

                //message
                if (response.message) {
                    ajaxMessage(response.message, ajaxResponseBaseTime);
                    $(".modal-dialog").fadeOut("fast", function () {
                        $(".modal").fadeOut("fast");
                    });
                   if(response.error == true){
                       setTimeout(function () {
                        window.location.reload();
                    }, 3000);
                   }
                    setTimeout(function () {
                        window.location.reload();
                    }, 3000);
                }
            },
            error: function (data) {
                $.each(data.responseJSON.errors, function (prefix, val) {
                    $('span.' + prefix + '_error').text(val[0]);
                });

                ajaxMessage(ajaxResponseRequestError, 5);
                load.fadeOut();
            }
        });
    });

    //FORMS
    $("form:not('.ajax_off')").submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var load = $(".ajax_load");

        if (typeof tinyMCE !== 'undefined') {
            tinyMCE.triggerSave();
        }

        form.ajaxSubmit({
            url: form.attr("action"),
            type: "POST",
            dataType: "json",
            beforeSend: function () {
                load.fadeIn(200).css("display", "flex");
                $(document).find('span.text-danger').text('');


            },
            uploadProgress: function (event, position, total, completed) {
                var loaded = completed;
                var load_title = $(".ajax_load_box_title");
                load_title.text("Enviando (" + loaded + "%)");

                if (completed >= 100) {
                    load_title.text("Aguarde, carregando...");
                }
            },
            success: function (response) {
                //redirect
                if (response.redirect) {
                    window.location.href = response.redirect;
                    ajaxMessage(response.message, ajaxResponseBaseTime);
                } else {
                    form.find("input[type='file']").val(null);
                    load.fadeOut(200);
                }

                //reload
                if (response.reload) {
                    window.location.reload();
                } else {
                    load.fadeOut(200);
                }

                //message
                if (response.message) {
                   ajaxMessage(response.message, ajaxResponseBaseTime);
                    $(".modal-dialog").fadeOut("fast", function () {
                        $(".modal").fadeOut("fast");
                    });
                   if(response.error == true){
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
                } else {
                    if (data.message) {
                        ajaxMessage(data.message, ajaxResponseBaseTime);
                    }
                }
                ajaxMessage(ajaxResponseRequestError, 5);
                load.fadeOut();
            }
        });
    });

    //DELETE ajax
    $(".j_delete_item").click(function (e) {
        e.preventDefault();

        var clicked = $(this);
        var data = clicked.data();
        var load = $(".ajax_load");

        $.ajax({
            url: clicked.attr('href'),
            type: "DELETE",
            data: data,
            dataType: "json",
            beforeSend: function () {
                load.fadeIn(200).css("display", "flex");
                $(document).find('span.text-danger').text('');
            },
            success: function (response) {

                $("#especialidade_delete").find('input[name="id"]').val(response.id);
                $("#especialidade_delete").find('input[name="especialidade"]').val(response.especialidade);
                document.getElementById('especialidade_update_form').action= clicked.attr('data-url');

                $("#especialidade_delete").modal("show");
                //redirect
                if (response.redirect) {
                    window.location.href = response.redirect;
                } else {
                    load.fadeOut(200);
                }

                //reload
                if (response.reload) {
                    window.location.reload();
                } else {
                    load.fadeOut(200);
                }

                //message
                if (response.message) {
                    ajaxMessage(response.message, ajaxResponseBaseTime);
                    $(".modal-dialog").fadeOut("fast", function () {
                        $(".modal").fadeOut("fast");
                    });
                   if(response.error == true){
                       setTimeout(function () {
                        window.location.reload();
                    }, 3000);
                   }
                    setTimeout(function () {
                        window.location.reload();
                    }, 3000);

                }
            },
            error: function (data) {
                $.each(data.responseJSON.errors, function (prefix, val) {
                    $('span.' + prefix + '_error').text(val[0]);
                });

                ajaxMessage(ajaxResponseRequestError, 5);
                load.fadeOut();

            }
        });
    });

    $(document).on("click", ".j_modal_edit", function(e){
        e.preventDefault();
        var clicked = $(this);
        var data = clicked.data();
        var load = $(".ajax_load");

        $.ajax({
            url: clicked.attr('href'),
            type: "GET",
            data: data,
            dataType: "json",
            beforeSend: function () {
                $(document).find('span.text-danger').text('');
            },
            success: function (response) {
                $("#especialidade_update").find('input[name="id"]').val(response.id);
                $("#especialidade_update").find('input[name="especialidade"]').val(response.especialidade);
                document.getElementById('especialidade_update_form').action= clicked.attr('data-url');

                $("#especialidade_update").modal("show");
            },
            error: function (data) {
                $.each(data.responseJSON.errors, function (prefix, val) {
                    $('span.' + prefix + '_error').text(val[0]);
                });

                ajaxMessage(ajaxResponseRequestError, 5);
                load.fadeOut();

            }
        });
    });

    $(".j_select_delete_item").on("click",  function(e){
        e.preventDefault();
        var clicked = $(this);
        $('#delete_modal').find('a').attr('href', clicked.attr('data-url'));
        $('#delete_modal').modal("show");

    });

    // SEARCH ZIPCODE
    $('.busca_cep').blur(function () {
        function emptyForm() {
            $("#endereco").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#complemento").val("");
            $("#numero").val("");
        }

        var zip_code = $(this).val().replace(/\D/g, '');
        var validate_zip_code = /^[0-9]{8}$/;

        if (zip_code != "" && validate_zip_code.test(zip_code)) {

            $(".rua").val("");
            $(".bairro").val("");
            $(".cidade").val("");
            $(".estado").val("");

            $.getJSON("https://viacep.com.br/ws/" + zip_code + "/json/?callback=?", function (data) {

                if (!("erro" in data)) {
                    $("#endereco").val(data.logradouro);
                    $("#bairro").val(data.bairro);
                    $("#cidade").val(data.localidade);
                    $("#uf").val(data.uf);
                    $("#complemento").val(data.complemento);
                    $("#numero").val(data.numero);
                } else {
                    emptyForm();
                    alert("CEP não encontrado.");
                }
            });
        } else {
            emptyForm();
            alert("Formato de CEP inválido.");
        }
    });


    // AJAX RESPONSE MONITOR
    var ajaxResponseBaseTime = 3;
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

    // MAKS

    $(".mask-date").mask('00/00/0000');
    $(".mask-datetime").mask('00/00/0000 00:00');
    $(".mask-month").mask('00/0000', {reverse: true});
    $(".mask-doc").mask('000.000.000-00', {reverse: true});
    $(".mask-crm").mask('A99999');
    $(".mask-cell").mask('(99) 99999-9999', {reverse: false});
    $(".mask-card").mask('0000  0000  0000  0000', {reverse: true});
    $(".mask-cep").mask('00000-000', {reverse: true});
    $(".mask-money").mask('000.000.000.000.000,00', {reverse: true, placeholder: "0,00"});
});

