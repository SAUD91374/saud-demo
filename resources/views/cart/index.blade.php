@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <header>
    <h1 class="text-center" style="box-shadow:1px 2px 10px">Your Cart</h1>
</header>
    <div class="row">
        @foreach($cart as $pdata)
        <div class="col-md-4 mb-4">
            <div class="card h-100 border" style="box-shadow:1px 2px 10px">
                @if($pdata->product->photos && $pdata->product->photos->count() > 0)
                <img src="/photos/{{ $pdata->product->photos->first()->file_path }}" class="card-img-top" alt="Product Image">
                @else
                <img src="default-image.jpg" class="card-img-top" alt="Default Image">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $pdata->product->name }}</h5>
                    <p class="card-text">{{ $pdata->product->description }}</p>
                    <div class="price-details">
                        @if($pdata->product->discount > 0)
                        <p class="product-price">Final Price: 
                            <span class="product-discounted-price">
                                ₹{{ $pdata->product->price - ($pdata->product->price * $pdata->product->discount / 100) }}
                            </span>
                            <span class="product-original-price">
                                ₹{{ $pdata->product->price }}
                            </span>
                            <span class="product-discount-percent">{{ $pdata->product->discount }}% OFF</span>
                        </p>
                        @else
                        <p class="product-price">
                            ₹{{ $pdata->product->price }}
                        </p>
                        @endif
                    </div>
                </div>
            <div class="card-footer">
                <form action="{{ route('cart.destroy', $pdata->product->id) }}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" name="id" value="{{ $pdata->product->id }}">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Do you really want to perform this task?')">Remove</button>
                    </form>
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
.card-title {
    font-weight: bold;
}

.price-details {
    margin-top: 10px;
}

.product-price {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 0;
}

.product-discounted-price {
    color: #ff5722;
    font-size: 20px;
}

.product-original-price {
    font-size: 16px;
    text-decoration: line-through;
    color: #757575;
    margin-left: 10px;
}

.product-discount-percent {
    font-size: 14px;
    color: #4caf50;
    margin-left: 10px;
}
header h1 {
  font-size: 70px;
  font-weight: 600;
  background-image: linear-gradient(to left, #553c9a, #b393d3);
  color: transparent;
  background-clip: text;
  -webkit-background-clip: text;
}

</style>
@endsection
