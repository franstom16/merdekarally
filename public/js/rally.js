var csrf_token = $('meta[name="csrf-token"]').attr('content');

var swalInit = swal.mixin({
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-primary',
    cancelButtonClass: 'btn btn-light'
});

var RallyScript = function() {

    // Setup module components
    var _componentJs = function(){
        $(".btn-cancel").click(function(){
            var meth = $(this).data("method");
            swalInit.fire({
                title: "Are you sure?",
                text: "Cancel this input!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes!",
                cancelButtonText: "No"
            }).then(function(s) {
                if (s.value) {
                    window.location.href = main_url + meth ;
                }
            })
        })
    }

    return {
        init: function() {
            _componentJs()
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    RallyScript.init()
})

function blockUI(blockDiv, msg) {
    msg = msg !== undefined && msg.length > 0 ? msg : 'Please wait';
    var dataBlock = {
        message: '<i class="icon-spinner4 spinner"></i><div>'+ msg +'... </div>',
        overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.8,
            cursor: 'wait'
        },
        css: {
            border: 0,
            padding: 0,
            backgroundColor: 'transparent'
        }
    };

    if (blockDiv !== undefined && blockDiv.length > 0) {
        $(blockDiv).block(dataBlock);
    } else {
        $.blockUI(dataBlock);
    }
}