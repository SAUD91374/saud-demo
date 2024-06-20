@extends('layouts.app')
@section('content')
<div>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
    {{-- @dd($data); --}}
</div>

    @foreach($pdata as $info)
<x-Show :$info />
{{-- @dd($info); --}}
{{-- @foreach($info->photos as $img)
<x-Show :$img /> --}}
<div>
    
</div>
@endforeach
{{-- @endforeach --}}
@endsection