@extends('layouts.requester')
@section('content')
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
