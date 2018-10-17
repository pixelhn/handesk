<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('fonts/gotham/stylesheet.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdi.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
    	<div class="requester-header">
    		<div class="requester-header-container description comment">
    			<h1> <i class="mdi {{ $ticket->priorityIcon() }}"></i> {{ $ticket->title }}</h1>
    			<span class="label ticket-status-{{ $ticket->statusName() }}">{{ __('ticket.' . $ticket->statusName()) }}</span>&nbsp;
    			<span class="date">{{  $ticket->created_at->diffForHumans() }} · {{  $ticket->requester->name }}</span>
    		</div>
    	</div>
        <div class="center requester-container">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
