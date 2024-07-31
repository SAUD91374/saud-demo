@extends('layouts.app')

@section('content')
<div class="container">
    <header>
        <h1 class="text-center" style="box-shadow:1px 2px 10px">Your Cart</h1>
    </header>
    <div class="row">
        <div class="col-md-12">
            <div class="card h-100 border" style="box-shadow:1px 2px 10px">
                <div class="product-info">
                    <div class="dgrid">
                        @foreach($cart as $pdata)
                        <div class="product-item">
                            <div class="product-image">
                                @if($pdata->product->photos && $pdata->product->photos->count() > 0)
                                <img src="/photos/{{ $pdata->product->photos->first()->file_path }}" class="card-img-top" alt="Product Image">
                                @else
                                <img src="default-image.jpg" class="card-img-top" alt="Default Image">
                                @endif
                            </div>
                            <div class="product-details">
                                <h5 class="card-title">{{ $pdata->product->name }}</h5>
                                <p class="card-text">{{ $pdata->product->description }}</p>
                                <p class="card-text">Quantity: {{ $pdata->qty }}</p>
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
                                <form action="cart/{{$pdata->product->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{ $pdata->product->id }}">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Do you really want to perform this task?')">Remove</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-summary">
        <h4>Cart Summary</h4>
        <p>Total Items: {{ count($cart) }}</p>
        <p>Total Price: ₹{{ $cart->sum('product.price') }}</p>
        <form action="/buy/{{$pdata->product->id}}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <input type="hidden" name="product_id" value="{{ $pdata->product->id }}">
            <input type="hidden" name="quantity" value="{{ $pdata->qty }}">
            <input type="hidden" name="total_price" value="{{ 10000 }}">
            <button class="btn btn-primary">Place Order</button>
        </form>
    </div>
</div>

<style>
    .dgrid {
        border: 1px solid #ddd;
        padding: 5px;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 10px;
    }
    .cart-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .product-info {
        display: flex;
        align-items: center;
    }
    .product-item {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .product-image {
        width: 100px;
        height: 100px;
        object-fit: cover;
        margin-bottom: 1rem;
    }
    .product-details {
        flex: 1;
        text-align: center;
    }
    .cart-summary {
        margin-top: 2rem;
    }
    .cart-summary h5,
    .cart-summary h4 {
        margin-bottom: 0.5rem;
    }
    .cart-summary.btn {
        width: 100%;
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
