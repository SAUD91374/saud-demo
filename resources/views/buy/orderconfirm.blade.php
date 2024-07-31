@extends('layouts.app')

@section('content')
{{-- @dd($buy); --}}
{{-- @dd($product); --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Order Confirmation</div>

                <div class="card-body">
                    <h4>Thank you for your purchase!</h4>
                    <p>Your order has been placed successfully. Here are the details of your order:</p>
                    
                    <div class="order-details">
                        @foreach ($buy as $buys)
                        <h5>Order ID: {{$buys['id']}}</h5>
                        @endforeach

                        @foreach ($product as $products)
                            
                        <p><strong>Product Name:</strong> {{ $products->name }}</p>
                        <p><strong>Quantity:</strong> {{ $products->quantity }}</p>
                        <p><strong>Total Price:</strong> ${{ number_format($products->price, 2) }}</p>
                        {{-- <p><strong>Status:</strong> {{ ucfirst($orders->status) }}</p> --}}
                        @endforeach
                    </div>

                    <a href="/user" class="btn btn-primary mt-3">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
