@if($ticket->isEscalated() )
    @if($ticket->status < App\Ticket::STATUS_CLOSED)
        <br>
        <div class="p4 bg-danger white mt4 br1 clear-both">
            {{ Form::open(["url" => route('tickets.escalate.destroy', $ticket), "method" => "delete" ]) }}
            <i class="mdi mdi-flag"></i> {!! __('ticket.escalatedDesc') !!}
            <button class="primary ml2"><i class="mdi mdi-flag"></i> {{ __('ticket.de-escalate') }}</button>
            {{ Form::close() }}
        </div>
    @endif
@else
    <div class="float-right mt-2 mr4">
    {{ Form::open(["url" => route('tickets.escalate.store', $ticket) ]) }}
    <button class="secondary"><i class="mdi mdi-flag"></i> {{ __('ticket.escalate') }}</button>
    {{ Form::close() }}
    </div>
@endif
