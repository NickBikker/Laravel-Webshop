<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ url('/') }}">Laravel webshop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @foreach($categories as $category)
          <a class="dropdown-item" href="/category/{{ $category->id }}">{{ $category->categoryname }}</a>
          @endforeach
        </div>
      </li>
      @auth
      <a class="nav-item nav-link" href="{{ route('webshop.orderPage') }}">Orders</a>
      @endauth
      @if (Route::has('login'))
      <div class="top-right links">
        <a class="nav-item" href="{{ route('webshop.shoppingCart') }}"><i class="fas fa-shopping-cart"></i> Shopping Cart
          <span class="badge badge-danger">{{ Session::has('cart') ? Session::get('cart')->totalQuantity : '0' }}</span>
        </a>
        @auth
        <a href="{{ url('/home') }}"><i class="fas fa-user"></i> Home</a>
        @else
        <a href="{{ route('login') }}">Login</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif
        @endauth
      </div>
      @endif
    </div>

  </div>
</nav>