@if( config('handesk.roadmap') )
    @if($ticket->getIdeaId())
        <div class="float-left mt-1 mr4 ml-3">
            <a class="button fs2 secondary" href="{{route('ideas.show',["id" => $ticket->getIdeaId()])}}" target="_blank"> <i class="mdi mdi-lightbulb-on-outline"></i> {{ __('ticket.seeIdea') }}</a>
        </div>
    @else
        <div class="float-left mt-2 mr4 ml-3">
        {{ Form::open(["url" => route('tickets.idea.store', $ticket)]) }}
            <button class="secondary dropdown"> <i class="mdi mdi-lightbulb-on-outline"></i> {{ __('ticket.createIdea') }}</button>
        {{ Form::close() }}
        </div>
    @endif
@endif

