@extends('layouts.app')
@section('content')
    <div class="description">
        <h3>Tickets ( {{ $tickets->count() }} )</h3>
    </div>

    <div class="m4">
        <a class="button " href="{{ route("tickets.create") }}"><i class="mdi mdi-plus"></i> {{ __('ticket.newTicket') }}</a>
        <a class="button secondary" id="mergeButton" onclick="onMergePressed()"> {{ __('ticket.merge') }}</a>
    </div>

    <div class="float-right mt-5 mr4">
        <input id="searcher" placeholder="{{__('lead.search')}}" class="ml2 shadow-outer-3">
        <div class="inline ml-4 o60"><i class="mdi mdi-magnify"></i></div>
    </div>

    <div id="results"></div>
    <div id="all">
        @paginator($tickets)
        @include('tickets.indexTable')
        @paginator($tickets)
    </div>
@endsection

@section('scripts')
    @include('components.js.merge')
    <script>
        $("#searcher").searcher('tickets/search/');
    </script>
@endsection
