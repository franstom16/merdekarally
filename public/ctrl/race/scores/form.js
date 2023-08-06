const ScoreJs = function() {

    // Select2 for length menu styling
    var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }

        // Initialize
        $('.form-select2').select2({
            allowClear: true,
            placeholder: '-- Please Select --'
        });
    };

    const _componentValidation = function() {
        if (!$().validate) {
            console.warn('Warning - validate.min.js is not loaded.');
            return;
        }

        // Initialize
        var validator = $('#form-score').validate({
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
                swalInit.fire({
                    title: "Are you sure",
                    text: "Save this data!",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes!",
                    cancelButtonText: "Cancel"
                }).then(function (s) {
                    if (s.value) {
                        $('#btn-submit > .spinner-border').removeClass('d-none')
                        $('#btn-submit > .icon-paperplane').addClass('d-none')
                        $('.card-submit button').attr('disabled', true)
                        var result = []
                        $.ajax({
                            type: 'POST',
                            url: e.action,
                            data: $(e).serialize(),
                            success: function(res) {
                                swalInit.fire({
                                    text: 'Data Successfully saved',
                                    type: "success"
                                });
                                setTimeout(function() {
                                    window.location.href = main_url + 'race/scores'
                                }, 2000)
                            },
                            error: function(e) {
                                if (e.responseJSON.errors !== undefined) {
                                    result.message = e.responseJSON.errors.error_msg
                                } else {
                                    result.message = ['Data failed to save']
                                }
                                $('#alert-msg').html('')
                                $(result.message).each(function(i, m) {
                                    $('#alert-msg').append('<li>'+ m +'</li>')
                                    $('html, body').animate({ scrollTop: 0 }, 'slow')
                                })
                                $('#alert-save').removeClass('d-none')
                                $('#btn-submit > .icon-paperplane').removeClass('d-none')
                                $('#btn-submit > .spinner-border').addClass('d-none')
                                $('.card-submit > button').attr('disabled', false)
                            }
                        })
                    }
                })
                return false
            }
        });
    }

    return {
        init: function() {
            _componentSelect2()
            _componentValidation()
        }
    }
}()

document.addEventListener('DOMContentLoaded', function() {
    ScoreJs.init()
})