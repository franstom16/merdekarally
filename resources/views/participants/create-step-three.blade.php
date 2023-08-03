@extends('layout.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('participants.create.step.three.post') }}" method="post" >
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">Step 3: Isi Kendaraan</div>
   
                    <div class="card-body">
  
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
  
                            <div class="form-group">
                                <label for="title">Brand:</label>
                                <input type="text" value="{{ $kendaraan->brand ?? '' }}" class="form-control" id="taskTitle"  name="brand">
                            </div>
  
                            <div class="form-group">
                                <label for="title">Model:</label>
                                <input type="text" value="{{ $kendaraan->model ?? '' }}" class="form-control" id="taskTitle"  name="model">
                            </div>
                            
                            <div class="form-group">
                                <label for="title">No Polisi:</label>
                                <input type="text" value="{{ $kendaraan->nopol ?? '' }}" class="form-control" id="taskTitle"  name="nopol">
                            </div>
                            
                            <div class="form-group">
                                <label for="title">CC:</label>
                                <input type="text" value="{{ $kendaraan->cc ?? '' }}" class="form-control" id="taskTitle"  name="cc">
                            </div>
                            
                            <div class="form-group">
                                <label for="title">Type:</label>
                                <input type="text" value="{{ $kendaraan->type ?? '' }}" class="form-control" id="taskTitle"  name="type">
                            </div>
  
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('participants.create.step.two') }}" class="btn btn-danger pull-right">Previous</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection