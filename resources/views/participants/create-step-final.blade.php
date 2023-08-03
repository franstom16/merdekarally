@extends('layout.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('participants.create.step.final.post') }}" method="post" >
                {{ csrf_field() }}
                <div class="card" x-data="{ checked: false }">
                    <div class="card-header">Step 4: Review Details</div>
   
                    <div class="card-body">
                            <h3>Data Peserta</h1>
                            <table class="table">
                                <tr>
                                    <td>participant Name:</td>
                                    <td><strong>{{$participant->nama_lengkap}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><strong>{{$participant->email}}</strong></td>
                                </tr>
                                <tr>
                                    <td>No Handphone:</td>
                                    <td><strong>{{$participant->hp}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Alamat:</td>
                                    <td><strong>{{$participant->alamat}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir:</td>
                                    <td><strong>{{$participant->tanggal_lahir}}</strong></td>
                                </tr>
                                
                            </table> <h3>Riwayat Kesehatan Peserta</h1>
                            <table class="table">
                                <tr>
                                    <td>Gol Darah:</td>
                                    <td><strong>{{$participant->gol_darah}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Riwayat Asma:</td>
                                    <td><strong>{{$participant->riwayat_asma}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Riwayat Jantung:</td>
                                    <td><strong>{{$participant->riwayat_jantung}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Kontak Darurat:</td>
                                    <td><strong>{{$participant->kontak_darurat}}</strong></td>
                                </tr>
                                
                            </table> <h3>Data Kendaraan</h1>
                            <table class="table">
                                <tr>
                                    <td>Brand:</td>
                                    <td><strong>{{$kendaraan->brand}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Model:</td>
                                    <td><strong>{{$kendaraan->model}}</strong></td>
                                </tr>
                                <tr>
                                    <td>CC:</td>
                                    <td><strong>{{$kendaraan->cc}}</strong></td>
                                </tr>
                                <tr>
                                    <td>type:</td>
                                    <td><strong>{{$kendaraan->type}}</strong></td>
                                </tr>
                                <tr>
                                    <td>No Polisi:</td>
                                    <td><strong>{{$kendaraan->nopol}}</strong></td>
                                </tr>
                                
                            </table>
                            <div class="mb-3 d-flex align-items-center flex-row">
                                <div class="me-5 ">
                                <input type="checkbox" onclick="Enable(this)" x-bind="checked" />
                                </div>
                                <label for="staticEmail" class="col-form-label">Saya mengerti dan setuju untuk mentaati peraturan dan syarat keikutsertaan dalam acara Gasber Rally Silatutahmi pada tanggal 6 Mei 2023 ini, dan siap bertanggung jawab atas pelanggaran aturan acara dan hukum yang berlaku di Negara Kesatuan Republik Indonesia. Bersama ini saya juga melepas tanggung jawab panitia atas akibat yang terjadi bila terjadi hal-hal yang tidak diinginkan.</label>
                            </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('participants.create.step.three') }}" class="btn btn-danger pull-right">Previous</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" id="submit-btn" disabled="true" x-bind:disabled="!checked" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    <script type="text/javascript">
Enable = function(val)
{
    var sbmt = document.getElementById("submit-btn"); //id of button

    if (val.checked == true)
    {
        sbmt.disabled = false;
    }
    else
    {
        sbmt.disabled = true;
    }
}    
</script>
@endsection