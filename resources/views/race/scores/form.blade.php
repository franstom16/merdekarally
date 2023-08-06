@extends('layout.admin')
@section('breadcrumb')
<a href="javascript:;" class="breadcrumb-item">Race</a>
<span class="breadcrumb-item active">Scores</span>
@endsection
@section('header_contents')
<div class="page-title d-flex pb-0">
    <h4>
        <a href="{{ url('race/scores') }}" class="btn btn-link text-dark px-0 mr-1"><i class="icon-arrow-left52"></i></a>
        <span class="font-weight-semibold">Edit - Scores</span>
    </h4>
    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
</div>
@endsection
@section('content')
@php $id = !empty($score->id) ? '/' . $score->id : '' @endphp
<form id="form-score" class="form-validate" method="post" action="{{ url('race/scores' . $id) }}">
    {{ csrf_field() }}
    @if (!empty($id))
        @method('PUT')
    @endif
    <div class="card">
        <div class="card-header header-elements-inline border-bottom">
            <h5 class="card-title font-weight-semibold">Edit</h5>
        </div>
        <div class="card-body pt-3">
            <div class="form-group">
                <label>Class *</label>
                <select class="form-control form-select2" id="class_id" name="class_id" required>
                    <option value=""></option>
                    @foreach ($raceClass as $rc)
                        @php $slct = isset($score->class_id) && $score->class_id == $rc->id ? ' selected' : '' @endphp
                        <option value="{{ $rc->id }}"{{ $slct }}>{{ $rc->class_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Min. Time *</label>
                <input type="number" class="form-control" id="min_time" name="min_time" value="{{ $score->min_time ?? '' }}" required />
            </div>
            <div class="form-group">
                <label>Max. Time *</label>
                <input type="number" class="form-control" id="max_time" name="max_time" value="{{ $score->max_time ?? '' }}" required />
            </div>
            <div class="form-group">
                <label>Score *</label>
                <input type="number" class="form-control" id="score" name="score" value="{{ $score->score ?? '' }}" required />
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="button" class="btn btn-cancel btn-light" data-method="race/scores">Cancel</button>
            <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
        </div>
    </div>
</form>
@endsection
@section('plugin_js')
<script src="{{ asset('plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset('plugins/forms/validation/validate.min.js') }}"></script>
@endsection
@section('script_js')
<script src="{{ asset('ctrl/race/scores/form.js') }}"></script>
@endsection