@extends('layout.public')
@section('content')
<div class="card table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="text-center">
            <tr>
                <th rowspan="4" colspan="3">OFFICIAL RESULT</th>
                <th class="py-1">TOTAL</th>
                <th class="py-1">START</th>
                <th class="py-1" colspan="3">POS 1</th>
                <th class="py-1"colspan="3">POS 2</th>
                <th class="py-1" colspan="3">POS 3</th>
                <th class="py-1" colspan="3">FINISH</th>
                <th class="py-1">TOTAL</th>
                <th class="py-1">SCORE</th>
            </tr>
            <tr>
                <th class="py-1">SCORE</th>
                <th class="py-1">TIME</th>
                <th class="py-1">TIME</th>
                <th class="py-1">TEMPUH</th>
                <th class="py-1">SCORE</th>
                <th class="py-1">TIME</th>
                <th class="py-1">TEMPUH</th>
                <th class="py-1">SCORE</th>
                <th class="py-1">TIME</th>
                <th class="py-1">TEMPUH</th>
                <th class="py-1">SCORE</th>
                <th class="py-1">TIME</th>
                <th class="py-1">TEMPUH</th>
                <th class="py-1">SCORE</th>
                <th class="text-nowrap py-1">WAKTU TEMPUH</th>
                <th class="text-nowrap py-1">WAKTU TOTAL</th>
            </tr>
            <tr>
                @foreach (range('A','P') as $v)
                <th class="py-1">{{ $v }}</th>
                @endforeach
            </tr>
            <tr>
                <th class="py-1">E+H+K+N+P</th>
                <th class="py-1"></th>
                <th class="py-1"></th>
                <th class="py-1">C-B</th>
                <th class="py-1"></th>
                <th class="py-1"></th>
                <th class="py-1">F-C</th>
                <th class="py-1"></th>
                <th class="py-1"></th>
                <th class="py-1">I-F</th>
                <th class="py-1"></th>
                <th class="py-1"></th>
                <th class="py-1">P-M</th>
                <th class="py-1"></th>
                <th class="py-1">D+G+J+M</th>
                <th class="py-1"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rank as $rk => $rkv)
                @foreach ($rkv as $kv => $v_rank)
                    <tr class="text-center text-uppercase">
                        <td class="text-nowrap border-right-0 py-1" colspan="2">{{ $rk }}</td>
                        <td class="text-nowrap border-left-0 border-right-0 py-1">Kategori {{ $kv }}</td>
                        <td class="border-left-0 py-1" colspan="16"></td>
                    </tr>
                    @php $n = 1 @endphp
                    @foreach ($v_rank as $vr)
                        <tr>
                            <td class="text-center p-1">{{ $n++ }}</td>
                            <td class="py-1">{{ $kv == 'Individu' ? $vr->participant_name : $vr->team_name }}</td>
                            <td class="text-center py-1">{{ $kv }}</td>
                        </tr>
                    @endforeach
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
@endsection