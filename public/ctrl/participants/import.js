var FileUpload = function() {

    var _componentFileUpload = function() {
        if (!$().fileinput) {
            console.warn('Warning - fileinput.min.js is not loaded.');
            return;
        }

        // Modal template
        var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
            '  <div class="modal-content">\n' +
            '    <div class="modal-header align-items-center">\n' +
            '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
            '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
            '    </div>\n' +
            '    <div class="modal-body">\n' +
            '      <div class="floating-buttons btn-group"></div>\n' +
            '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
            '    </div>\n' +
            '  </div>\n' +
            '</div>\n';

        // Buttons inside zoom modal
        var previewZoomButtonClasses = {
            toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
            fullscreen: 'btn btn-light btn-icon btn-sm',
            borderless: 'btn btn-light btn-icon btn-sm',
            close: 'btn btn-light btn-icon btn-sm'
        };

        // Icons inside zoom modal classes
        var previewZoomButtonIcons = {
            prev: '<i class="icon-arrow-left32"></i>',
            next: '<i class="icon-arrow-right32"></i>',
            toggleheader: '<i class="icon-menu-open"></i>',
            fullscreen: '<i class="icon-screen-full"></i>',
            borderless: '<i class="icon-alignment-unalign"></i>',
            close: '<i class="icon-cross2 font-size-base"></i>'
        };

        // File actions
        var fileActionSettings = {
            zoomClass: '',
            zoomIcon: '<i class="icon-zoomin3"></i>',
            dragClass: 'p-2',
            dragIcon: '<i class="icon-three-bars"></i>',
            removeClass: '',
            removeErrorClass: 'text-danger',
            removeIcon: '<i class="icon-bin"></i>',
            indicatorNew: '<i class="icon-file-plus text-success"></i>',
            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
            indicatorError: '<i class="icon-cross2 text-danger"></i>',
            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
        };

        $('.file-input').fileinput({
            browseLabel: 'Browse',
            browseIcon: '<i class="icon-file-plus mr-2"></i>',
            uploadIcon: '<i class="icon-file-upload2 mr-2"></i>',
            removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },
            initialCaption: "No file selected",
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons,
            fileActionSettings: fileActionSettings
        });

        $('.file-input-ajax').fileinput({
            browseLabel: 'Browse',
            uploadUrl: main_url + "participants/import", // server upload action
            uploadAsync: true,
            maxFileCount: 1,
            initialPreview: [],
            browseIcon: '<i class="icon-file-plus mr-2"></i>',
            uploadIcon: '<i class="icon-file-upload2 mr-2"></i>',
            removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
            fileActionSettings: {
                removeIcon: '<i class="icon-bin"></i>',
                removeClass: '',
                uploadIcon: '<i class="icon-upload"></i>',
                uploadClass: '',
                zoomIcon: '<i class="icon-zoomin3"></i>',
                zoomClass: '',
                indicatorNew: '<i class="icon-file-plus text-success"></i>',
                indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
                indicatorError: '<i class="icon-cross2 text-danger"></i>',
                indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>',
            },
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },
            initialCaption: 'No file selected',
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons
        });
    }

    var _componentValidation = function() {
        if (!$().validate) {
            console.warn('Warning - validate.min.js is not loaded.');
            return;
        }

        $.validator.addMethod('filesize', function (value, element, param) {
            return this.optional(element) || (element.files[0].size <= param)
        }, 'File size must be less than equal to 2MB');

        // Initialize
        var validator = $('.form-validate').validate({
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

                // Input with icons and Select2
                else if (element.parents().hasClass('form-group-feedback') || element.hasClass('select2-hidden-accessible')) {
                    error.appendTo( element.parent() );
                }

                // Input group, styled file input
                else if (element.parent().is('.uniform-uploader, .uniform-select') || element.parents().hasClass('input-group')) {
                    error.appendTo( element.parent().parent() );
                }

                // Other elements
                else {
                    error.insertAfter(element);
                }
            },
            rules: {
                file_import: {
                    required: true,
                    extension: "xls,xlsx",
                    filesize: 2097152,
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
                            result.message = 'Import Success'
                            notifType = 'success'
                        } else {
                            result.success = false
                            result.message = 'Import Failed'
                        }
                        new Noty({
                            text: result.message,
                            type: notifType
                        }).show();
                        $('.spinner-border').hide()
                        $('#btn-submit').attr('disabled', false)
                        setTimeout(function() {
                            window.location.href = main_url + 'participants'
                        }, 200)
                    },
                    error: function(e) {
                        if (e.responseJSON.errors !== undefined && e.responseJSON.errors.error_msg) {
                            result.message = e.responseJSON.errors.error_msg
                        } else {
                            result.message = 'Import Failed'
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
    };

    return {
        init: function() {
            _componentFileUpload();
            _componentValidation()
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    FileUpload.init();
});
