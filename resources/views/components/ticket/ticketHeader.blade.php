<tr>
        <td>
                <input type="checkbox" name="selected[{{$ticket->id}}]" meta:index="{{$ticket->id}}" class="hidden selector">
                <span data-toogle="tooltip" title="{{ __('ticket.' . $ticket->statusName()) }}" class="label ticket-status-{{ $ticket->statusName() }}">{{ link_to_route('tickets.index', str_limit(__('ticket.' . $ticket->statusName()), 1, ''), ["status" => $ticket->status]) }}</span>&nbsp;
                <span data-toogle="tooltip" title="{{ __('ticket.' . $ticket->priorityName()) }}" class="label ticket-priority-{{ $ticket->priorityName() }}"><i class="mdi {{ $ticket->priorityIcon() }}" style="color: #fff"></i></span>&nbsp;
                @if( $ticket->isEscalated() ) <i class="mdi mdi-flag"></i> @endif
                @if( $ticket->getIssueId() ) <i class="mdi mdi-bug"></i> @endif
                <a href="{{ route('tickets.show', $ticket) }}"> #{{ $ticket->id }}. {{  str_limit($ticket->title, 35) }}</a>
        </td>
        <td> {{ link_to_route('tickets.index', $ticket->requester->name, ["requester_id" => $ticket->requester_id] )           }}</td>
        <td> {{ link_to_route('tickets.index', nameOrDash( $ticket->team ), ["team_id" => $ticket->team_id] )           }}</td>
        <td> {{ link_to_route('tickets.index', nameOrDash( $ticket->user ), ["user_id" => $ticket->user_id] )           }}</td>
        <td class="hide-mobile"> {{ $ticket->created_at->diffForHumans()}}</td>
        <td class="hide-mobile"> {{ $ticket->updated_at->diffForHumans()}}</td>
</tr>