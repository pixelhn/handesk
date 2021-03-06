@if( config('issues.driver') && count( config('issues.repositories')) > 0)
    @if(auth()->user()->assistant || auth()->user()->admin)
        @if($ticket->getIssueId())
            <div class="float-left mt-1 mr4 ml-3">
                <a class="button fs2 secondary" href="{{$ticket->issueUrl()}}" target="_blank"> <i class="mdi mdi-bug"></i> {{ __('ticket.seeIssue') }}</a>
            </div>
        @else
            <div class="float-left mt-2 mr4 ml-3">
            <button class="secondary dropdown"> <i class="mdi mdi-bug"></i> {{ __('ticket.createIssue') }}</button>
            <ul class="dropdown-container p4">
                @foreach(config('issues.repositories') as $name => $repo)
                    <li><a class="pointer" onClick="createIssueToRepo('{{$repo}}')"> {{ $name }}</a></li>
                @endforeach
            </ul>
            {{ Form::open(["url" => route('tickets.issue.store', $ticket), "id" => "issue-form"]) }}
                {{ Form::hidden('repository',"", ["id" => "issue-repository"]) }}
            {{ Form::close() }}
            </div>
        @endif
    @endif

    <script>
        function createIssueToRepo(repo){
            $('#issue-repository').val(repo);
            $('#issue-form').submit();
        }
    </script>
@endif
