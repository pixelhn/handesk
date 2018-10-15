<div class="tinyHeader">
    <div class="float-left">@include('components.gravatar',["user" => auth()->user() ])</div>
    <a href="{{route('profile.show')}}"><button class="ternary fs2">{{ auth()->user()->name }}</button></a>
    <div class="float-right ml3" style="margin-top: -5px">
        {{ Form::open(["url" => route('logout')]) }}
        <button class="ternary fs4"><i class="mdi mdi-power"></i></button>
        {{ Form::close() }}
    </div>
</div>