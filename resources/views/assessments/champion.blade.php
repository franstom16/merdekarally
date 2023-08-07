@for($i = 0; $i < 3; $i++)
    @if (!empty($team[$i]))
        @php $medalTeam = $i > 0 ? $i == 3 ? 'third' : 'second' : 'first' @endphp 
    @else
        @php $medalTeam = '' @endphp
    @endif

    @if (!empty($individual[$i]))
        @php $medalIndividual = $i > 0 ? $i == 3 ? 'third' : 'second' : 'first' @endphp 
    @else
        @php $medalIndividual = '' @endphp
    @endif
    <tr>
        <td>
            @if (!empty($medalTeam))
                <i class="icon-medal-{{ $medalTeam }}"></i>
            @endif
        </td>
        <td>{{ $team[$i]->team_name ?? '' }}</td>
        <td class="border-right">{{ $team[$i]->race_results ?? '' }}</td>
        <td>
            @if (!empty($medalIndividual))
                <i class="icon-medal-{{ $medalIndividual }}"></i>
            @endif
        </td>
        <td>{{ $individual[$i]->participant_name ?? '' }}</td>
        <td>{{ $individual[$i]->race_results ?? '' }}</td>
    </tr>
@endfor