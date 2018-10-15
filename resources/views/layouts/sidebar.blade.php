<div class="sidebar" id="sidebar">
    <div class="show-mobile absolute ml2 mt-2 fs3">
        <span class="fs3 white" onclick="toggleSidebar()">X</span>
    </div>

	<a class="nav-logo" href="{{ url('/') }}">
		<img src="{{ url('images/favicon.png') }}" alt="" class="small-logo" width="35" height="35">
		<span class="color">Pixel</span><span>Pay</span>
	</a>

    @include('layouts.sidebar.tickets')
    @if( config('handesk.leads') )
        {{-- @include('layouts.sidebar.leads') --}}
    @endif
    @if( config('handesk.roadmap') )
        @include('layouts.sidebar.roadmap')
    @endif

    <br>
    <h4> <i class="mdi mdi-chart-bar"></i> {{ trans_choice('report.report', 2) }}</h4>
    <ul>
        @include('components.sidebarItem', ["url" => route('reports.index'), "title" => trans_choice('report.report', 2) ])
    </ul>

    <br>
    <h4> <i class="mdi mdi-tune"></i> {{ trans_choice('admin.admin',2) }}</h4>
    <ul>
        @include('components.sidebarItem', ["url" => route('teams.index'),      "title" => trans_choice('team.team',        2) ])
        @if(auth()->user()->admin)
            @include('components.sidebarItem', ["url" => route('users.index'),      "title" => trans_choice('ticket.user',      2) ])
            @include('components.sidebarItem', ["url" => route('settings.edit', 1), "title" => trans_choice('setting.setting',  2) ])
        @endif
    </ul>
    <br><br>
</div>

<div class="show-mobile absolute ml2 mt3 fs3">
    <span class="fs3 black" onclick="toggleSidebar()">☰</span>
</div>