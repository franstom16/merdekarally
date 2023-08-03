@extends('layout.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('participants.create.step.one.post') }}" method="POST">
                @csrf
  
                <div class="card">
                    <div class="card-header">Step 1: Basic Info</div>
  
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
                                <label for="title">participant Name:</label>
                                <input type="text" value="{{ $participant->nama_lengkap ?? '' }}" class="form-control" id="taskTitle"  name="nama_lengkap">
                            </div>
                          
                            <div class="form-group">
                                <label for="title">participant Email:</label>
                                <input type="text" value="{{ $participant->email ?? '' }}" class="form-control" id="taskTitle"  name="email">
                            </div>
                            <div class="form-group">
                                <label for="title">Password:</label>
                                <input type="password" value="{{ $participant->password ?? '' }}" class="form-control" id="taskTitle"  name="password">
                            </div>
                            <div class="form-group">
                                <label for="title">Confirm password:</label>
                                <input type="password" value="{{ $participant->password_confirmation ?? '' }}" class="form-control" id="taskTitle"  name="password_confirmation">
                            </div>
                            <div class="form-group">
                                <label for="title">hp:</label>
                                <input type="text" value="{{ $participant->hp ?? '' }}" class="form-control" id="taskTitle"  name="hp">
                            </div>
                            <div class="form-group">
                                <label for="title">alamat:</label>
                                <input type="text" value="{{ $participant->alamat ?? '' }}" class="form-control" id="taskTitle"  name="alamat">
                            </div>
                            <div class="form-group">
                                <label for="title">tanggal lahir:</label>
                                <input type="date" value="{{ $participant->tanggal_lahir ?? '' }}" class="form-control" id="taskTitle"  name="tanggal_lahir">
                            </div>
                    </div>
  
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection