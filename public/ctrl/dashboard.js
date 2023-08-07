var DashboardJs = function() {
    var _componentChampion = function(raceClass) {
        $.ajax({
            type: 'GET',
            url: main_url + 'assessment/champion/' + raceClass,
            success: function(res) {
                $('#assessment'+ raceClass +'Table tbody').html(res)
            }
        })
    }

    var _componentDatatable = function() {
        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }

        $('#assessmentTeamTable').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': main_url + 'assessments/teams',
                'data': {
                    '_token': csrf_token
                },
                'error': function (xhr, error, code) {
                    console.log(xhr);
                }
            },
            'order': [[2, 'asc']],
            'columnDefs': [{
                targets: [0],
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
                { data: 'team_name' },
                { data: 'start_race' },
                { data: 'post_1' },
                { data: 'post_2' },
                { data: 'post_3' },
                { data: 'finish_race' },
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

    var _componentStart = async function() {
        await new Promise ((resolve, reject) => {
            try {
                _componentChampion('CCY')
                resolve('berhasil')
            } catch (e) {
                reject('gagal')
            }
        })
        await new Promise ((resolve, reject) => {
            try {
                _componentChampion('DLP')
                resolve('berhasil')
            } catch (e) {
                reject('gagal')
            }
        })
    }

    return {
        init: function() {
            _componentDatatable()
            _componentSelect2()
            _componentStart()
        }
    }
}()

document.addEventListener('DOMContentLoaded', function() {
    DashboardJs.init()
})