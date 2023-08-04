@extends('layouts.admiin')
@section('content')
<form class="form-validate" method="post" action="{{ url('asset/products/price/import') }}" enctype="multipart/form-data">
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
            <button type="button" class="btn btn-cancel btn-light" data-method="asset/products/price">Cancel</button>
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
