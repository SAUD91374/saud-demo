<div class="dgrid">
<div class="card" style="width: 18rem;">
    @if($info['photos'])
        <div class="image-gallery">
            @foreach($info->photos as $img)
                <div title="Product Image" class="image-item" id="{{ $img['id'] }}">
                    <img class="slide active" src="/photos/{{ $img['file_path'] }}" alt="Product Image {{ $img['id'] }}">
                </div>
            @endforeach
        </div>
    @endif
</div>
        <div class="card-body">
          <h5 class="card-title">{{$info['name']}}</h5>
          <p class="card-text">{{$info['description']}}</p>
        </div>
        <ul class="list-group-flush">
            @if($info['discount'] > 0)
            <p class="product-price">Final Price:
                <span class="product-discounted-price">
                    ₹{{($info['price'] - ($info['price'] * $info['discount'] / 100))}}
                </span>
                <span class="product-original-price">
                    ₹{{($info['price'])}}
                </span>
                <span class="product-discount-percent">{{$info['discount']}}% OFF</span>
            </p>
            @else
            <ul class="product-price">
                ₹{{($info['price']) }}
            </ul>
        </ul>
        @endif
        <div class="card-body">
            <form action="/cart" method="POST">
                @csrf
                <input type="number" class="form-control" name="qty" id="qty" min="0" placeholder="0" >
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="product_id" value="{{ $info->id }}">
                <button type="submit" class="btn btn-primary">Add To Cart</button>
            </form>
            <a href="#" class="btn btn-success">Buy Now</a>
            
        </div>
      </div>
    {{-- @endforeach --}}
</div>
<style>
    .list-group-flush {
        font-weight: bold;
        
    }
    /* css for card */
    .card{
        margin: 5px;
    }
    .dgrid{
        border:1px solid black;
        padding: 5px;
        margin-: 5px;
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
        position:absolute;
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
{{-- <script>
    // JavaScript function to redirect to another page
    function redirectToPage() {
        var userId = "{{ $user->id }}";
        window.location.href = '{{ route("user.show", ":userId") }}'.replace(':userId', userId);
</script> --}}
