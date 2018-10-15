@if( $value > 0)
    <span class="green fs1">( <i class="mdi mdi-arrow-up"></i> {{ number_format($value,0) }} % )</span>
@else
    <span class="red fs1">( <i class="mdi mdi-arrow-down"></i> {{ number_format($value* -1,0) }} % )</span>
@endif