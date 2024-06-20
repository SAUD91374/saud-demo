{{-- @dd($pdata); --}}
@extends('layouts.app')

@section('content')
<div class="dgrid">
    {{-- <div class="card" style="width: 18rem;">
        @if($pdata->photos)
            <div class="image-gallery">
                @foreach($pd->photos as $img)
                    <div title="Product Image" class="image-item" id="{{ $img->id }}">
                        <img class="slide active" src="/photos/{{ $img->file_path }}" alt="Product Image {{ $img->id }}">
                    </div>
                @endforeach
            </div>
        @endif
    </div> --}}
    @dd($cart);
    @foreach ($cart->product as $pdata)
    {{-- @dd($$cart->product); --}}
    <div class="card-body">
        <h5 class="card-title">{{$pdata['name'] }}??<span>n/a</span>:</h5>
        <p class="card-text">{{ $pdata['description']  }}</p>
    </div>
    {{-- <ul class="list-group-flush">
        @if($pd->discount > 0)
            <p class="pdata-price">Final Price:
                <span class="pdata-discounted-price">
                    ₹{{ $pd->price - ($pdata->price * $pdata->discount / 100) }}
                </span>
                <span class="pdata-original-price">
                    ₹{{ $pdata->price }}
                </span>
                <span class="pdata-discount-percent">{{ $pdata->discount }}% OFF</span>
            </p>
        @else
            <ul class="pdata-price">
                ₹{{ $pdata->price }}
            </ul>
        @endif
    </ul> --}}
    <div class="container">
        <a href="#" class="btn btn-success">Buy Now</a>
    </div>
</div>
@endforeach

<style>
.list-group-flush {
    font-weight: bold;
}
.card {
    margin: 5px;
}
.dgrid {
    border: 1px solid black;
    padding: 5px;
    margin: 5px;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
}
.product-price {
    font-size: 16px;
    font-weight: bold;
    margin: 0 0 16px;
    margin-left: 8px;
}
.product-discounted-price {
    color: #ff5722;
}
.product-original-price {
    font-size: 14px;
    text-decoration: line-through;
    color: #757575;
    margin-left: 8px;
}
.product-discount-percent {
    font-size: 12px;
    color: #4caf50;
    margin-left: 8px;
}
.slider-container {
    position: absolute;
    background-color: white;
    width: 400px;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    text-align: center;
}
.main-photo {
    position: relative;
    width: 100%;
    height: auto;
    border-bottom: 1px solid #e0e0e0;
}
.slide {
    display: none;
    width: 100%;
    height: auto;
}
.slide.active {
    display: block;
}
.prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    border-radius: 0 3px 3px 0;
    user-select: none;
    background-color: rgba(0,0,0,0.5);
}
.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}
.prev:hover, .next:hover {
    background-color: rgba(0,0,0,0.8);
}
</style>
@endsection

