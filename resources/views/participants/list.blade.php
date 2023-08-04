@extends('layout.admin')
@section('breadcrumb')
<a href="{{ url('participants') }}" class="breadcrumb-item active">Participant</a>
@endsection
@section('header_contents')
<div class="page-title d-flex">
    <h4><i class="icon-vcard mr-2"></i> <span class="font-weight-semibold">Participant</h4>
    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
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