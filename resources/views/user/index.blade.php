@extends('layouts.app') 
@section('content')
{{-- @dd($pdata); --}}
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">NotSoCoolGadgets</a>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="/cart">Your Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/account">My Account</a>
          {{-- <form action="/account" method="POST">
          <input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}">
          <button class="nav-link">My Account</button>
          </form> --}}
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <a href="#" class="ml-2"><i class="fas fa-shopping-cart"></i></a>
    </nav>
  </header>
  
  <div class="container">
    {{-- <a href="/cart"></a> --}}
    <header>
      <h1 class="text-center" style="box-shadow:1px 2px 10px">Product Listing</h1>
  </header>
      <div class="row">
          @foreach($pdata as $product)
          <div class="col-md-4 mb-4">
              <div class="card h-100" onclick="openModal('{{ $product->id }}','{{ $product->photos->first()->file_path }}', '{{ $product->name }}', '{{ $product->description }}', '{{ $product->price }}')">
                  <img src="/photos/{{ $product->photos->first()->file_path }}" class="card-img-top" alt="{{ $product->name }}">
                  <div class="card-body">
                      <h5 class="card-title">{{ $product->name }}</h5>
                      <p class="card-text">{{ $product->description }}</p>
                      <ul class="list-group list-group-flush">
                        @if($product->discount > 0)
                        <p class="product-price">Final Price:
                            <span class="product-discounted-price">
                                ₹{{($product->price - ($product->price * $product->discount / 100))}}
                            </span>
                            <span class="product-original-price">
                                ₹{{($product->price)}}
                            </span>
                            <span class="product-discount-percent">{{$product->discount}}% OFF</span>
                        </p>
                    @else
                        <ul class="product-price">
                            ₹{{($product->price) }}
                        </ul>
                    @endif
                  </div>
               </div>
          </div>
          @endforeach
      </div>
  </div>
  <div class="overlay" id="overlay"></div>
  
  <div id="modal" class="modal">
      <span class="close-btn" onclick="closeModal()">&times;</span>
      <div id="modal-content">
          <!-- Product details will be loaded here -->
      </div>
  </div>
  
  
  
  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h5>About Us</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla auctor, vestibulum magna sed, convallis ex.</p>
        </div>
        <div class="col-md-3">
          <h5>Quick Links</h5>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
    <div class="col-md-3">
        <h5>Follow Us</h5>
        <ul>
            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i> Facebook</a></li>
            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></li>
            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i> Instagram</a></li>
        </ul>
    </div>
    <div class="col-md-3">
        <h5>Newsletter</h5>
        <p>Stay updated with our latest news and offers!</p>
        <form>
            <input type="email" placeholder="Enter your email">
            <button type="submit">Subscribe</button>
        </form>
    </div>
</div>
<p class="copyright">Copyright &copy; 2024 CoolGadgets. All rights reserved to Saud Pathan.</p>
</div>
</footer>
<style>
    /* Global Styles */
    /* .button:hover.stars{
      display: block;
      filter: drop-shadow(0 0 10px
      #fffdef);
    } */
    
    * {
        box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: Arial, sans-serif;
  line-height: 1.6;
  color: #333;
  background-color: #f9f9f9;
}

h1, h2, h3, h4, h5, h6 {
  font-weight: bold;
  color: #333;
}

a {
  text-decoration: none;
  color: #337ab7;
}

a:hover {
  color: #23527c;
}

/* Header Styles */

.navbar {
  padding: 1rem 2rem;
  background-color: #fff;
  border-bottom: 1px solid #ddd;
}

.navbar-brand {
  font-size: 1.5rem;
  font-weight: bold;
  color: #337ab7;
}

.navbar-toggler {
  border: none;
  padding: 0.5rem 1rem;
  font-size: 1.5rem;
  line-height: 1;
  background-color: transparent;
  border-radius: 0.25rem;
}

.navbar-toggler:hover {
  background-color: #337ab7;
  color: #fff;
}

.navbar-nav {
  margin-left: auto;
}

.nav-item {
  margin-right: 20px;
}

.nav-link {
  color: #337ab7;
  transition: color 0.2s ease;
}

.nav-link:hover {
  color: #23527c;
}

/* Banner Section Styles */

.banner-image {
  background-image: url('banner.jpg');
  background-size: cover;
  background-position: center;
  height: 100vh;
  width: 100%;
}

.banner-text {
  padding: 2rem;
  background-color: rgba(255, 255, 255, 0.8);
  border-radius: 0.25rem;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.banner-text h1 {
  font-size: 2.5rem;
  margin-bottom: 1rem;
}

.banner-text p {
  font-size: 1.2rem;
  margin-bottom: 2rem;
}

.banner-text a {
  font-size: 1.2rem;
  padding: 0.5rem 1rem;
  border-radius: 0.25rem;
  background-color: #337ab7;
  color: #fff;
}

.banner-text a:hover {
  background-color: #23527c;
}

/* Product Listings Styles */
    .card {
      border: 1px solid #ddd;
      border-radius: 8px;
      overflow: hidden;
      cursor: pointer;
      transition: transform 0.3s ease;
  }
  
  .card:hover {
      transform: scale(1.02);
  }
  
  .card img {
      width: 100%;
      height: 200px; /* Adjust height as needed */
      object-fit: cover;
  }
  
  .card-body {
      padding: 1rem;
  }
  
  .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1000;
  }
  
  .modal {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #fff;
      padding: 1rem;
      border-radius: 8px;
      z-index: 1100;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  
  .modal #modal-content {
      text-align: center;
  }
  
  .modal .close-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
      font-size: 24px;
      color: #aaa;
  }
  
  @media (max-width: 768px) {
      .card {
          margin-bottom: 20px;
      }
  } 
/* Footer Styles */

.footer {
  background-color: #333;
  color: #fff;
  padding: 2rem 0;
}

.footer .container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

.footer .row {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
}

.footer .col-md-3 {
  margin-bottom: 20px;
}

.footer h5 {
  font-size: 1.2rem;
  margin-bottom: 10px;
}

.footer ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer li {
  margin-bottom: 10px;
}

.footer a {
  color: #fff;
  text-decoration: none;
}

.footer a:hover {
  color: #ccc;
}

.footer .fab {
  font-size: 1.5rem;
  margin-right: 10px;
}

.footer .copyright {
  font-size: 0.8rem;
  margin-top: 20px;
  text-align: center;
}
.image-item img {
  max-width: 100%;
  max-height: 100%;
  object-fit: cover;
}
.image-item:hover{
    transition:0s 
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
    header h1 {
  font-size: 70px;
  font-weight: 600;
  background-image: linear-gradient(to left, #553c9a, #b393d3);
  color: transparent;
  background-clip: text;
  -webkit-background-clip: text;
}
.modal img {
        width: 100%; /* Make sure the image takes the full width of the modal */
        height: auto; /* Maintain the aspect ratio */
        max-height: 60vh; /* Limit the height to 60% of the viewport height */
        object-fit: contain; /* Ensure the image is fully visible */
    }
    </style>
    <script>
      // function openModal(id, name, description, price) {
      //     document.getElementById('modal-content').innerHTML = 
      //     `  
      //     <div class="container border border-dark" style="box-shadow: 1px 2px 10px"> 
      //       <h2>${name}</h2>
      //         <p>${description}</p>
      //         <p>Price:${price}</p>
      //          <form action="/cart" method="Post">
      //               @csrf
      //               <input type="number" class="form-control" name="qty" id="qty">
      //               <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
      //               <input type="hidden" name="product_id" value="{{ $product->id }}">
      //               <button type="submit" class="btn btn-primary">Add To Cart</button>
      //           </form>
      //     </div>
      //     `;
      //     document.getElementById('modal').style.display = 'block';
      //     document.getElementById('overlay').style.display = 'block';
      // }
      function openModal(id,photos, name, description, price) {
    // Fetch the CSRF token dynamically
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    document.getElementById('modal-content').innerHTML = `
        <div class="container border border-dark" style="box-shadow: 1px 2px 10px"> 
           <img src="/photos/${photos}" alt="${name}" class="img-fluid">
            <h2>${name}</h2>
            <p>${description}</p>
            <p>Price: ${price}</p> 
            <form action="/cart" method="POST"> 
                <input type="hidden" name="_token" value="${csrfToken}">
                <input type="number" class="form-control" name="qty" id="qty" required min="1" value="1">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="product_id" value="${id}">
                <button type="submit" class="btn btn-primary">Add To Cart</button>
            </form>
        </div>
    `;

    // Display the modal and overlay
    document.getElementById('modal').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

  
      function closeModal() {
          document.getElementById('modal').style.display = 'none';
          document.getElementById('overlay').style.display = 'none';
      }
      
      function addToCart(productId) {
          // Add your logic for adding the product to the cart here.
          // For example, you might make an AJAX request to your server.
          console.log("hello");
          // console.log("Product added to cart:", productId);
      }
  </script>
  @endsection
