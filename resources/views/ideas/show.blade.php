@extends('layouts.app')
@section('content')
    <div class="description comment">
        <div class="breadcrumb">
            <a href="{{ route('ideas.index') }}"> {{ trans_choice('idea.idea',2) }} </a>
        </div>

        <h3>#{{ $idea->id }}. {{ $idea->title }} </h3>
        @busy <span class="label idea-status-{{ $idea->statusName() }}">{{ __("idea." . $idea->statusName() ) }} </span> &nbsp;
        <span class="date">{{  $idea->created_at->diffForHumans() }} · {{  $idea->requester->name }} &lt;{{$idea->requester->email}}&gt;</span>
        <h4> {{ __('idea.score') }}: {{ $idea->score() }} </h4>

        @can('update', $idea)
            <div class="float-right mt-4 mr4 ml-3">
                <a class="button secondary mr4 fs2" href="{{route('ideas.edit', $idea)}}"> <i class="mdi mdi-pencil"></i> {{ __('idea.edit') }} </a>
                @include('components.idea.issue')
            </div>
        @endcan
    </div>

    <div class="comment new-comment">
        {!! nl2br( strip_tags($idea->body)) !!}
    </div>

    <div class="comment new-comment">
        <table class="maxw600 no-padding">
            <tr><td> {{ trans_choice('ticket.tag',2) }}</td><td colspan="4"> <input id="tags" name="tags" value="{{ $idea->tagsString() }}"></td></tr>
            <tr><td> {{ __('idea.repository') }} </td><td> {{ $idea->repositoryName() }} </td></tr>
            <tr>
            	<td> {{ __('idea.developmentEffort') }}</td>
            	<td>
            		<div class="progress">
            			<div class="progress-bar" style="width: {{$idea->development_effort*10}}%" role="progressbar" aria-valuenow="{{$idea->development_effort*10}}" aria-valuemin="0" aria-valuemax="100"></div>
            		</div>
            	</td>
            </tr>
            <tr>
            	<td> {{ __('idea.salesImpact') }}</td>
            	<td>
            		<div class="progress">
            			<div class="progress-bar" style="width: {{$idea->sales_impact*10}}%" role="progressbar" aria-valuenow="{{$idea->sales_impact*10}}" aria-valuemin="0" aria-valuemax="100"></div>
            		</div>
            	</td>
            </tr>
            <tr>
            	<td> {{ __('idea.currentImpact') }}</td>
            	<td>
            		<div class="progress">
            			<div class="progress-bar" style="width: {{$idea->current_impact*10}}%" role="progressbar" aria-valuenow="{{$idea->current_impact*10}}" aria-valuemin="0" aria-valuemax="100"></div>
            		</div>
            	</td>
            </tr>
        </table>
    </div>
@endsection


@section('scripts')
    @include('components.js.taggableInput', ["el" => "tags", "endpoint" => "ideas", "object" => null])
@endsection