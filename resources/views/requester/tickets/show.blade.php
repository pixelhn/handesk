@extends('layouts.requester')
@section('content')
    <div class="description comment">
        <h3> <i class="mdi mdi-format-list-checks"></i> {{ $ticket->title }}</h3>
        <span class="label ticket-status-{{ $ticket->statusName() }}">{{ __('ticket.' . $ticket->statusName()) }}</span>&nbsp;
        <span class="date">{{  $ticket->created_at->diffForHumans() }} · {{  $ticket->requester->name }}</span>
    </div>

    @if($ticket->status != App\Ticket::STATUS_CLOSED)
        <div class="comment new-comment">
            {{ Form::open(["url" => route("requester.comments.store",$ticket->public_token), "files" => true]) }}
            <textarea name="body"></textarea>
            <br>
            <div class="pull-right">
            	@include('components.uploadAttachment', ["attachable" => $ticket, "type" => "tickets"])
            </div>
            
            @if($ticket->status == App\Ticket::STATUS_SOLVED)
                {{ __('ticket.reopen') }} ? {{ Form::checkbox('reopen') }}
            @else
                {{ __('ticket.isSolvedQuestion') }} {{ Form::checkbox('solved') }}
            @endif

            <br><br>
            <button class="uppercase ph3"> @busy <i class="mdi mdi-comment"></i> {{ __('ticket.comment') }}</button>
            {{ Form::close() }}
        </div>
    @endif
    @include('components.ticketComments', ["comments" => $ticket->comments])
@endsection
