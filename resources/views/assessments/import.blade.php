@extends('layout.admin')
@section('breadcrumb')
<span class="breadcrumb-item active">Participant</span>
@endsection
@section('header_contents')
<div class="page-title d-flex pb-0">
    <h4>
        <a href="{{ url('assessments') }}" class="btn btn-link text-dark px-0 mr-1"><i class="icon-arrow-left52"></i></a>
        <span class="font-weight-semibold">Import Assessment</span>
    </h4>
    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
</div>
@endsection
@section('content')
<form class="form-validate" method="post" action="{{ url('assessments/import') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="card">
        <div class="card-header header-elements-inline border-bottom">
            <h5 class="card-title font-weight-semibold"> Import</h5>
        </div>
        <div class="card-body pt-3">
            <div class="form-group row">
                <div class="col-lg-12">
                    <label class="font-weight-semibold">Time</label>
                    <select class="form-control form-select2" name="race_time" required>
                        <option value=""></option>
                        <option value="start_race">Start</option>
                        <option value="post_1">Post 1</option>
                        <option value="post_2">Post 2</option>
                        <option value="post_3">Post 3</option>
                        <option value="finish_race">Finish</option>
                    </select>
                </div>
            </div>
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
            <button type="button" class="btn btn-cancel btn-light" data-method="assessments">Cancel</button>
        </div>
    </div>
</form>
@endsection
@section('plugin_js')
<script src="{{ asset('plugins/uploaders/fileinput/plugins/purify.min.js') }}"></script>
<script src="{{ asset('plugins/uploaders/fileinput/plugins/sortable.min.js') }}"></script>
<script src="{{ asset('plugins/uploaders/fileinput/fileinput.min.js') }}"></script>
<script src="{{ asset('plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset('plugins/forms/validation/validate.min.js') }}"></script>
<script src="{{ asset('plugins/forms/validation/additional_methods.min.js') }}"></script>
@endsection
@section('script_js')
<script src="{{ asset('ctrl/assessments/import.js') }}"></script>
@endsection
