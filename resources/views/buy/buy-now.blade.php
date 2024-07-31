@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Buy Now
                </div>
                <div class="card-body">
                    <form action="/buy" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" id="product_name" class="form-control" value="{{ $product->name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="product_price">Price</label>
                            <input type="text" id="product_price" class="form-control" value="{{ $product->price }}" readonly>
                        </div>

                        <button type="submit" class="btn btn-primary">confirm order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
