@extends('layouts.app')
@section('content')
<div>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
    {{-- @dd($data); --}}
</div>

    @foreach($data as $info)
<x-Show :$info />
{{-- @dd($info); --}}
<div>
    <style>
        .list-group-item {
            font-weight: bold;
        }
        /* css for card */
        .card{
            margin: 5px;
        }
        .dgrid{
            border:1px solid black;
            padding: 5px;
            margin: 5px;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
        }
        /* css for price */
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
        /* css for photo */
        .slider-container {
            position: relative;
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
</div>
@endforeach
@endsection