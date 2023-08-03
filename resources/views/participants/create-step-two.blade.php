@extends('layout.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('participants.create.step.two.post') }}" method="POST">
                @csrf
                <div class="card"  >
                    <div class="card-header">Step 2: Status & Stock</div>
  
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
                                <label for="title">participant Gol Darah:</label>
                                <select class="form-select" id="gol_darah" aria-label="Floating label select example" value="{{$participant->gol_darah ?? null}}" name="gol_darah">
                                    <option selected>Open this select menu</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
  
  
                            <div class="form-group">
                                <label for="title">Riwayat Asma:</label>
                                <select class="form-select" id="riwayat_asma" aria-label="Floating label select example" value="{{$participant->riwayat_asma ?? null}}" name="riwayat_asma">
                                    <option selected>Open this select menu</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak ada">Tidak ada</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Riwayat Jantung:</label>

                                <select class="form-select" id="riwayat_jantung" aria-label="Floating label select example" value="{{$participant->riwayat_jantung ?? null}}" name="riwayat_jantung">
                                    <option selected>Open this select menu</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak ada">Tidak ada</option>
                                </select>                       
                            </div>
                            <div class="form-group">
                                <label for="title">participant Kontak Darurat:</label>
                                <input type="text" value="{{ $participant->kontak_darurat ?? '' }}" class="form-control" id="taskTitle"  name="kontak_darurat">
                            </div>

                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('participants.create.step.one') }}" class="btn btn-danger pull-right">Previous</a>
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