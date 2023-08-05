var swalInit = swal.mixin({
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-primary',
    cancelButtonClass: 'btn btn-light'
});

var ParticipantList = function() {
    var _componentDatatable = function() {
        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }

        $('#assessmentTable').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': main_url + 'assessments/get-data',
                'data': {
                    '_token': csrf_token
                },
                'error': function (xhr, error, code) {
                    console.log(xhr);
                }
            },
            'order': [[1, 'asc']],
            'columnDefs': [{
                targets: [0, 8],
                className: 'text-center',
                orderable: false,
                searchable: false
            }],
            'columns': [
                {
                    data: null,
                    render: function ( data, type, row, meta ) {
                        return meta.row + meta.settings._iDisplayStart + 1
                    }
                },
                { data: 'participant' },
                { data: 'race_date' },
                { data: 'start_race' },
                { data: 'post_1' },
                { data: 'post_2' },
                { data: 'post_3' },
                { data: 'finish_race' },
                { data: 'action' },
            ]
        });
    }

    // Select2 for length menu styling
    var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }

        // Initialize
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
            width: 'auto'
        });
    };

    return {
        init: function() {
            _componentDatatable()
            _componentSelect2()
        }
    }
}()

document.addEventListener('DOMContentLoaded', function() {
    ParticipantList.init()
})

function deleteData(ele) {
    swalInit.fire({
        title: "Are you sure?",
        text: "Delete this data!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes!",
        cancelButtonText: "Cancel"
    }).then(function (s) {
        if (!s.value) {
            return false;
        } else {
            blockUI('#card-table')
            $.ajax({
                type: 'POST',
                url: $(ele).attr('action'),
                data: $(ele).serialize(),
                success: function(res) {
                    swalInit.fire({
                        text: 'Data deleted successfully',
                        type: "success"
                    });
                    setTimeout(function() {
                        window.location.href = main_url + 'participants'
                    }, 3000)
                },
                error: function(e) {
                    if (e.responseJSON.errors !== undefined) {
                        var err_msg = ''
                        $(e.responseJSON.errors.error_msg).each(function(a, b) {
                            err_msg += '<div class="font-weight-bold"><span class="icon-circle-small mr-1"></span>'+ b +'</div>'
                        })
                        swalInit.fire({
                            text: 'a',
                            type: "error"
                        });
                        $('#swal2-content').html(err_msg)
                    } else {
                        console.log(e)
                    }
                }
            })
        }
    })
    return false
}
