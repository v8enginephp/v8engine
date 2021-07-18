function ajax(uri, data, method, autoResponse, loading, formData = null) {
    if (formData !== null)
        data = formData;
    return $.ajax({
        type: method,
        url: url + uri,
        cache: !1,
        contentType: !1,
        processData: !1,
        data: data,
        success: function (result) {
            if (loading) {
                $("#loader").css("display", "none");
            }
            console.log(result);
            if (autoResponse === true) {
                result = JSON.parse(result);
                if (result.status) {
                    if (result.action) {
                        if (result.action === "REFRESH") {
                            location.reload();
                            return;
                        }
                        if (result.action === "REDIRECT") {
                            url = result.url.substr(0, 4) === "http" ? result.url : url + result.url;
                            window.location.replace(url);
                            return;
                        }
                        if (result.action === "ACTION_ALERT") {
                            url = result.url.substr(0, 4) === "http" ? result.url : url + result.url;
                            if (result.mode === "swal") {
                                swal("", result.msg, result.color);
                                $(".swal2-confirm").click(function () {
                                    window.location.replace(url);
                                });
                                return;
                            } else if (result.mode === "toastr") {
                                toastr[result.color](result.msg);
                                setTimeout(function () {
                                    if (url === "REFRESH")
                                        location.reload();
                                    window.location.replace(url);
                                }, 800)
                                return;
                            }
                        }
                    }
                    swal("", result.msg, "success");
                    if (result.data.hide)
                        $(".swal2-confirm").css({"display": "none"});
                } else {
                    swal("", result.msg, "error");
                }
            }
            return result;
        },
        beforeSend: function () {
            if (loading) {
                $("#loader").css("display", "flex"),
                    $("#loader").css("opacity", "0.75");
            }

        },
        complete: function () {
            if (loading) {
                $("#loader").css("display", "none");
            }
        },
        error: function (error) {
            if (loading) {
                $("#loader").css("display", "none");
            }
            console.log(error), toastr.error("مشکل در اتصال به سرور");
        }

    });
}

toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-bottom-left",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "2000",
    "timeOut": "5000",
    "extendedTimeOut": "1500",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

function validate(element) {
    var val;
    return "" == $(element).val() || null == $(element).val()
        ? ($(element).addClass("is-invalid"),
            setTimeout(function () {
                $(element).removeClass("is-invalid");
            }, 3000),
        element + "/")
        : "";
}

function validator(fields) {
    for (var c = fields.length, i = 0, data = ""; i < c;)
        (data += validate(fields[i])), i++;
    return (
        "" == data ||
        (toastr.error("لطفا فیلد های اجباری را تکمیل نمایید"), data)
    );
}

function ajaxdata(fields, values) {
    var form_data = new FormData();
    for (var c = fields.length, i = 0; i < c;) {
        var field = fields[i].substr(1);
        form_data.append(field, values[i]), i++;
    }
    return form_data;
}

function formwizard(fields) {
    if (1 == validator(fields)) {
        for (var c = fields.length, i = 0, values = []; i < c;) {
            var val = $(fields[i]).val();
            values.push(val), i++;
        }
        var data;
        return ajaxdata(fields, values);
    }
    return !1;
}

function submiter(fields, url, method, files, optional, vars, keys, autoResponse = true, loading = true, formData = null) {
    var wizard = formwizard(fields);
    if (0 != wizard) {
        if (Array.isArray(optional))
            for (var c = optional.length, i = 0; i < c;) {
                var val = $(optional[i]).val(),
                    field = optional[i].substr(1);
                wizard.append(field, val), i++;
            }
        if (Array.isArray(files))
            for (var c = files.length, i = 0; i < c;) {
                console.log(files[i])
                var val = $(files[i]).prop("files")[0],
                    field = files[i].substr(1);

                wizard.append(field, val), i++;
            }
        if (Array.isArray(vars))
            for (var c = vars.length, i = 0; i < c;) {
                var field = keys[i];
                wizard.append(field, vars[i]), i++;
            }
        return ajax(url, wizard, method, autoResponse, loading, formData);
    }
    return !1;
}


function formSubmit(formSelector, autoResponse = true, loading = true) {
    const form = $(formSelector);
    const apiUrl = form.attr("action");
    const method = form.attr("method");
    const formData = new FormData($(form)[0])

    if (!checkRequireField(formData))
        return toastr.error("لطفا فیلد های اجباری را تکمیل نمایید");

    return $.ajax({
        type: method,
        url: apiUrl,
        data: formData,
        processData: false,
        contentType: false,
        success: function (result, status, header) {
            if (loading) {
                $("#loader").css("display", "none");
            }
            console.log(result);
            if (autoResponse === true) {
                if (header.getResponseHeader("content-type") !== 'application/json')
                    result = JSON.parse(result);

                if (result.status) {
                    if (result.action) {
                        if (result.action === "REFRESH") {
                            location.reload();
                            return;
                        }
                        if (result.action === "REDIRECT") {
                            url = result.url.substr(0, 4) === "http" ? result.url : url + result.url;
                            window.location.replace(url);
                            return;
                        }
                        if (result.action === "ACTION_ALERT") {
                            url = result.url.substr(0, 4) === "http" ? result.url : url + result.url;
                            if (result.mode === "swal") {
                                swal("", result.msg, result.color).then(()=> {
                                    console.log(url);
                                    window.location.replace(url);
                                });

                                return;
                            } else if (result.mode === "toastr") {
                                toastr[result.color](result.msg);
                                setTimeout(function () {
                                    if (url === "REFRESH")
                                        location.reload();
                                    window.location.replace(url);
                                }, 800)
                                return;
                            }
                        }
                    }
                    swal("", result.msg, "success");
                    if (result.data.hide)
                        $(".swal2-confirm").css({"display": "none"});
                } else {

                    swal("", result.msg === "Validate Fails" ? "اعتبارسنجی با شکست مواجه شد." : result.msg, "error");

                    $(".rpError").remove();

                    for (const item in result.data) {
                        $(`[name='${item}']`).after(`<p class="text-danger rpError">${result.data[item]}</p>`)
                    }
                        rpScroll($(`[name='${Object.getOwnPropertyNames(result.data)[0]}']`));
                }
            }
            return result;
        },
        beforeSend: function () {
            if (loading) {
                $("#loader").css("display", "flex"),
                    $("#loader").css("opacity", "0.75");
            }

        },
        complete: function () {
            if (loading) {
                $("#loader").css("display", "none");
            }
        },
        error: function (error) {
            if (loading) {
                $("#loader").css("display", "none");
            }
            console.log(error), toastr.error("مشکل در اتصال به سرور");
        }

    });
}

function checkRequireField(form) {
    var result = true;
    var counter=0;

    $(".is-invalid").removeClass("is-invalid");

    for (const item of form) {
        const element = $(`[name='${item[0]}']`);
        if ($(element).data("require") === 1 && $(element).val() === "") {
            if (counter==0){
                rpScroll(element);
                counter++;
            }
            element.addClass("is-invalid");
            result = false;
        }
    }

    return result;
}

function rpScroll(element){
    $([document.documentElement, document.body]).animate({
        scrollTop: $(element).offset().top-200
    }, 2000);
}