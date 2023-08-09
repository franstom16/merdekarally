@extends('layout.public')
@section('content')
<div class="card table-responsive">
    <table class="table table-striped">
        <thead class="text-center">
            <tr>
                <th rowspan="4" colspan="3">OFFICIAL RESULT</th>
                <th>TOTAL</th>
                <th>START</th>
                <th colspan="3">POS 1</th>
                <th colspan="3">POS 2</th>
                <th colspan="3">POS 3</th>
                <th colspan="3">FINISH</th>
                <th>TOTAL</th>
                <th>SCORE</th>
            </tr>
            <tr>
                <th>SCORE</th>
                <th>TIME</th>
                <th>TIME</th>
                <th>TEMPUH</th>
                <th>SCORE</th>
                <th>TIME</th>
                <th>TEMPUH</th>
                <th>SCORE</th>
                <th>TIME</th>
                <th>TEMPUH</th>
                <th>SCORE</th>
                <th>TIME</th>
                <th>TEMPUH</th>
                <th>SCORE</th>
                <th class="text-nowrap">WAKTU TEMPUH</th>
                <th class="text-nowrap">WAKTU TOTAL</th>
            </tr>
            <tr>
                @foreach (range('A','P') as $v)
                <th>{{ $v }}</th>
                @endforeach
            </tr>
            <tr>
                <th>E+H+K+N+P</th>
                <th></th>
                <th></th>
                <th>C-B</th>
                <th></th>
                <th></th>
                <th>F-C</th>
                <th></th>
                <th>I-F</th>
                <th></th>
                <th></th>
                <th>P-M</th>
                <th></th>
                <th>D+G+J+M</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
@endsection