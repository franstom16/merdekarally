@extends('layout.admin')
@section('breadcrumb')
<span class="breadcrumb-item active">Participant</span>
@endsection
@section('header_contents')
<div class="page-title d-flex pb-0">
    <h4><i class="icon-vcard mr-2"></i> <span class="font-weight-semibold">Participant</span></h4>
    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
</div>
<div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
    <div class="btn-group mt-4">
        <a hre="{{ url('participants/create') }}" class="btn bg-indigo-400"><i class="icon-plus2 mr-2"></i> Create</a>
        <button type="button" class="btn bg-indigo-400 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"></button>
        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(163px, 36px, 0px);">
            <a href="{{ url('participants/import') }}" class="dropdown-item"><i class="icon-menu7"></i> Import</a>
        </div>
    </div>
</div>
@endsection
@section('content')
<div id="card-table" class="card table-responsive">
    <table id="participantTable" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>ID's</th>
                <th>Participant</th>
                <th>Category</th>
                <th>Class</th>
                <th>Blood</th>
                <th><i class="icon-gear"></i></th>
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
<script src="{{ asset('ctrl/participants/list.js') }}"></script>
@endsection