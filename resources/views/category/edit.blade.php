@extends('layouts.app')

@section('content')
<div class="container">
<form action="/category/{{$info['id']}}" method="post">
    @csrf
    @method('put')
<div class="mb-3">
    <label for="name"> Category Name:</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category" value="{{$info['name']}}">
</div>
<div class="mb-3">
    <label for="description">Description:</label>
    <input type="text" class="form-control" id="description" name="description" placeholder="Enter description" value="{{$info['description']}}">
</div>
<div class="mb-3">
    <button class="btn btn-success">Save</button>
</div>
</form>
</div>
@endsection