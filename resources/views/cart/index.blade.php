{{-- @dd($cartd); --}}
@extends('layouts.app')

@section('content')
@foreach($cartd as $carti)
{{$carti->find($carti['id']);}}
@endforeach
