@extends('layout.admin')
@section('breadcrumb')
<a href="javascript:;" class="breadcrumb-item">Race</a>
<span class="breadcrumb-item active">Scores</span>
@endsection
@section('header_contents')
<div class="page-title d-flex pb-0">
    <h4><i class="icon-racing mr-2"></i> <span class="font-weight-semibold">Scores</span></h4>
    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
</div>
<div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
    <div class="btn-group mt-4">
        <a hre="{{ url('race/scores/create') }}" class="btn bg-indigo-400"><i class="icon-plus2 mr-2"></i> Create</a>
        <button type="button" class="btn bg-indigo-400 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"></button>
        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(163px, 36px, 0px);">
            <a href="{{ url('race/scores/import') }}" class="dropdown-item"><i class="icon-import"></i> Import</a>
        </div>
    </div>
</div>
@endsection
@section('content')
<div id="card-table" class="card table-responsive">
    <table id="assessmentTable" class="table table-striped">
        <thead class="text-center">
            <tr>
                <th rowspan="2">No</th>
                <th colspan="2">Total Time <small>(minutes)<small></th>
                <th rowspan="2">Score</th>
                <th rowspan="2"><i class="icon-gear"></i></th>
            </tr>
            <tr>
                <th>Min.</th>
                <th>Max.</th>
            </tr>
        </thead>
    </table>
</div>
@endsection
@section('plugin_js')
<script src="{{ asset('plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset('plugins/notifications/sweet_alert.min.js') }}"></script>
<script src="{{ asset('plugins/tables/datatables/datatables.min.js') }}"></script>
@endsection
@section('script_js')
<script src="{{ asset('js/datatable.js') }}"></script>
<script src="{{ asset('ctrl/race/scores/list.js') }}"></script>
@endsection