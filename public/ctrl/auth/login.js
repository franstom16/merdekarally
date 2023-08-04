const LoginJs = function() {
    const _componentNoty = function() {
        if (typeof Noty == 'undefined') {
            console.warn('Warning - noty.min.js is not loaded.');
            return;
        }

        // Override Noty defaults
        Noty.overrideDefaults({
            theme: 'limitless',
            layout: 'topRight',
            type: 'alert',
            timeout: 2500
        });
    }

    const _componentJs = function() {
        if (!$().validate) {
            console.warn('Warning - validate.min.js is not loaded.');
            return;
        }

        // Initialize
        var validator = $('#form-login').validate({
            ignore: 'input[type=hidden]',
            errorClass: 'validation-invalid-label',
            errorMessage: 'validation-invalid-label',
            successClass: 'validation-valid-label',
            validClass: 'validation-valid-label',
            highlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
            },
            unhighlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
            },
            errorPlacement: function(error, element) {
				// Unstyled checkboxes, radios
                if (element.parents().hasClass('form-check')) {
                    error.appendTo( element.parents('.form-check').parent() );
                }
                // Select2
                else if (element.hasClass('select2-hidden-accessible')) {
                    error.appendTo( element.parent() );
                }
                // Input group, styled file input
                else if (element.parents().hasClass('input-group')) {
                    error.appendTo( element.parent().parent() );
                }
                // Other elements
                else {
                    error.insertAfter(element);
                }
            },
			submitHandler:function(e) {
                $('.spinner-border').show()
                $('#btn-submit').attr('disabled', true)
                var result = []
                var notifType = 'warning'
                $.ajax({
                    type: 'POST',
                    url: e.action,
                    data: $(e).serialize(),
                    success: function(res) {
                        if (res.success !== undefined) {
                            result.message = 'Login Success'
                            notifType = 'success'
                        } else {
                            result.success = false
                            result.message = 'Login Failed'
                        }
                        new Noty({
                            text: result.message,
                            type: notifType
                        }).show();
                        $('.spinner-border').hide()
                        $('#btn-submit').attr('disabled', false)
                        setTimeout(function() {
                            alert(main_url)
                            window.location.href = main_url
                        }, 200)
                    },
                    error: function(e) {
                        if (e.responseJSON.errors !== undefined && e.responseJSON.errors.error_msg) {
                            result.message = e.responseJSON.errors.error_msg
                        } else {
                            result.message = 'Login Failed'
                        }
                        $(result.message).each(function(i, m) {
                            new Noty({
                                text: m,
                                type: notifType
                            }).show();
                        })
                        $('.spinner-border').hide()
                        $('#btn-submit').attr('disabled', false)
                    }
                })
                return false
			}
        });
    }

    return {
        init: function() {
            _componentJs()
            _componentNoty()
        }
    }
}()

document.addEventListener('DOMContentLoaded', function() {
    LoginJs.init()
})
