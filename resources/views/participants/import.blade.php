@extends('layout.admin')
@section('breadcrumb')
<span class="breadcrumb-item active">Participant</span>
@endsection
@section('header_contents')
<div class="page-title d-flex pb-0">
    <h4>
        <i class="icon-vcard mr-2"></i> 
        <span class="font-weight-semibold">
            <a href="{{ url('participants') }}" class="btn btn-link text-light mr-1">
                <i class="icon-arrow-left52"></i>
            </a>
            Import Participant
        </span>
    </h4>
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
<form class="form-validate" method="post" action="{{ url('participants/import') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="card card-cpm">
        <div class="card-header header-elements-inline">
            <h5 class="card-title font-weight-semibold"> Create</h5>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-lg-12">
                    <h6 class="card-title font-weight-semibold"> Content Preview</h6>
                    <input type="file" class="file-input" name="file_import" data-fouc accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                    <span class="form-text text-muted">
                        Drag a file or click browse for a file to upload.
                        Accepted file formats: <code>.xls & .xlsx</code>.
                        Maximum file upload size: <code>2MB</code>
                    </span>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-cancel btn-light" data-method="participants">Cancel</button>
        </div>
    </div>
</form>
@endsection
@section('plugin_js')
<script src="{{ asset('plugins/uploaders/fileinput/plugins/purify.min.js') }}"></script>
<script src="{{ asset('plugins/uploaders/fileinput/plugins/sortable.min.js') }}"></script>
<script src="{{ asset('plugins/uploaders/fileinput/fileinput.min.js') }}"></script>
<script src="{{ asset('plugins/forms/validation/validate.min.js') }}"></script>
<script src="{{ asset('plugins/forms/validation/additional_methods.min.js') }}"></script>
@endsection
@section('script_js')
<script src="{{ asset('ctrl/participants/import.js') }}"></script>
@endsection
