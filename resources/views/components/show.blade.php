<div>
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
    {{-- @dd($info); --}}
    {{-- @foreach($info as $data) --}}
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$info['name']}}</h5>
          <p class="card-text">{{$info['description']}}</p>
        </div>
        <ul class="list-group list-group-flush">
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
        @endif
        <div class="card-body">
            <form action="/cart" method="POST">
                @csrf
                {{-- <input type="number" class="form-control" name="qty" id="qty"> --}}
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="product_id" value="{{ $info->id }}">
                <button type="submit" class="btn btn-primary">Add To Cart</button>
            </form>
            <a href="#" class="btn btn-success">Buy Now</a>
            
        </div>
      </div>
    {{-- @endforeach --}}
</div>