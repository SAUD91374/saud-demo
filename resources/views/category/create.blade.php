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
<form action="/category" method="POST">
    @csrf
<div class="mb-3">
    <label for="name"> Category Name:</label>
    <input type="text" class="form-control"  style="color:#960dad" id="name" name="name" placeholder="Enter Category" value="{{old['name']}}">
</div>

<div class="mb-3">
    <label for="description">Description:</label>
    <input type="text" class="form-control"  style="color:#960dad" id="description" name="description" placeholder="Enter description">
</div>
<div class="mb-3 text-center">
    <button class="button-91 ">Save</button>
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