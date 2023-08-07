@extends('layout.public')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card table-responsive">
                @php $classCode = 'CCY' @endphp
                @include('dashboard.assessment')
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card table-responsive">                
                @php $classCode = 'DLP' @endphp
                @include('dashboard.assessment')
            </div>
        </div>
    </div>
</div>
@endsection