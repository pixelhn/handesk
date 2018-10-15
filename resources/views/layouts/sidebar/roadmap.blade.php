@if(auth()->user()->admin)
    <br>
    <h4> <i class="mdi mdi-chart-timeline"></i> {{ __('idea.roadmap') }}</h4>
    @include('components.sidebarItem', ["url" => route('ideas.index').'?pending=true',      "title" => trans_choice('idea.pendingIdea',        2) ])
    @include('components.sidebarItem', ["url" => route('ideas.index').'?ongoing=true',      "title" => trans_choice('idea.idea',        2) ])
    @include('components.sidebarItem', ["url" => route('roadmap.index'),      "title" => trans_choice('idea.roadmap', 1) ])
    <ul>
@endif