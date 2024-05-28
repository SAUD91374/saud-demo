@extends('layouts.app')

@section('content')
<style>
    .dgrid{
        border:1px solid #ddd;
        padding: 5px;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
    }
</style>
<div class="container">
    <h1 class="text-center">Product Form</h1>
<form action="/product/" method="post" enctype="multipart/form-data">
    @csrf
    <h4><label for="" style="color:#960dad">Select Category:</label></h4>
    <div class="dgrid">
        @foreach($cdata as $cinfo)
            <div><input type="checkbox"  required id="c{{$cinfo['id']}}" name="category_id[]" value="{{$cinfo['id']}}">
                <label for="c{{$cinfo['id']}}">
                {{$cinfo['name']}}
            </label>
            </div>
        @endforeach
        </div>
    <div class="mb-3">
    <h4><label for="name" style="color:#960dad"> Product Name:</label></h4>
    <input type="text" class="form-control" id="name" required name="name" placeholder="Enter product" >
</div>
<div class="mb-3">
    <h4><label for="price" style="color:#960dad"> Product Price:</label></h4>
    <input type="number" class="form-control" id="price" required id="price" placeholder="Enter Price" >
</div>
<div class="mb-3">
    <h4><label for="discount" style="color:#960dad"> Discount:</label></h4>
    <input type="number" class="form-control" id="discount" required name="discount" placeholder="Enter Discount">
</div>
<div class="mb-3">
    <h4><label for="qty" style="color:#960dad"> Quantity:</label></h4>
    <input type="text" class="form-control" id="qty" name="qty" required placeholder="Enter Quantity ">
</div>
<div class="mb-3">
    <h4><label for="mfg" style="color:#960dad"> M.F.D:</label></h4>
    <input type="date" class="form-control" id="mfg" required name="mfg">
</div>
<div class="mb-3">
    <h4><label for="photo" style="color:#960dad"> Photo:</label></h4>
    <input type="file" class="form-control" id="photo" required name="photo" accept="/images">
</div>
<div class="mb-3 text-center">
    <button class="button-91">Save</button>

</div>
</form>
</div>
<style>
     /* CSS */
.button-91 {
  color: #fff;
  padding: 15px 25px;
  background-color: #960dad;
  background-image: radial-gradient(93% 87% at 87% 89%, rgba(0, 0, 0, 0.23) 0%,
   transparent 86.18%),
    radial-gradient(66% 66% at 26% 20%, rgba(255, 255, 255, 0.55) 0%, rgba(255, 255, 255, 0) 69.79%, rgba(255, 255, 255, 0) 100%);
  box-shadow: inset -3px -3px 9px rgba(255, 255, 255, 0.25), inset 0px 3px 9px rgba(255, 255, 255, 0.3), inset 0px 1px 1px rgba(255, 255, 255, 0.6), inset 0px -8px 36px rgba(0, 0, 0, 0.3), inset 0px 1px 5px rgba(255, 255, 255, 0.6), 2px 19px 31px rgba(0, 0, 0, 0.2);
  border-radius: 14px;
  font-weight: bold;
  font-size: 16px;

  border: 0;

  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;

  cursor: pointer;
}
h1 {
        font-size: 70px;
        font-weight: 600;
        font-family: 'Roboto', sans-serif;
        color: aquamarine;
        text-transform: uppercase;
        text-shadow: 1px 1px 0px #960dad,
        1px 2px 0px #960dad,
        1px 3px 0px #960dad,
        1px 4px 0px #960dad,
        1px 5px 0px #960dad,
        1px 6px 0px #960dad,
        1px 10px 5px rgba(16,16,16,0.5),
        1px 15px 10px rgba(16,16,16,0.4),
        1px 20px 30px rgba(16,16,16,0.3),
        1px 25px 50px rgba(16,16,16,0.2);

    }

</style>
@endsection