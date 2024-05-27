@extends('layouts.app')

@section('content')
<div class="container">
<form action="/product" method="POST">
    @csrf
<div class="mb-3">
    <label for="name"> Product Name:</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$info['name']}}" placeholder="Enter product">
</div>
<div class="mb-3">
    <label for="price"> Product Price:</label>
    <input type="number" class="form-control" value="{{$info['price']}}id="price" name="price" placeholder="Enter Price">
</div>
<div class="mb-3">
    <label for="discount"> Discount:</label>
    <input type="text" class="form-control" id="discount"value="{{$info['discount']}} name="discount" placeholder="Enter Discount">
</div>
<div class="mb-3">
    <label for="qty"> Quantity:</label>
    <input type="text" class="form-control" id="qty" name="qty"value="{{$info['qty']}}" placeholder="Enter Quantity ">
</div>
<div class="mb-3">
    <label for="mfg"> M.F.G:</label>
    <input type="date" class="form-control" value="{{$info['mfg']}}" id="mfg" name="mfg">
</div>

<div class="mb-3">
    <button class="btn btn-success">Save</button>
</div>
</form>
</div>
@endsection