<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">

<div class="container">

    <!-- Logo -->
    <a class="navbar-brand fw-bold fs-3 text-warning" href="/">
        <i class="bi bi-bag-fill"></i> E-Store
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMenu">

        <!-- Left Menu -->
        <ul class="navbar-nav ms-3">

            <li class="nav-item">
                <a class="nav-link active" href="/">
                    <i class="bi bi-house-door"></i> Home
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-grid"></i> Categories
                </a>
            </li>

            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.create') }}">
                    <i class="bi bi-plus-circle"></i> Add Product
                </a>
            </li>
            @endauth

        </ul>

        <!-- Search -->
        <form class="d-flex mx-auto" style="width:40%;">
            <input class="form-control rounded-start-pill"
                   type="search"
                   placeholder="Search products...">

            <button class="btn btn-warning rounded-end-pill">
                <i class="bi bi-search"></i>
            </button>
        </form>

        <!-- Right Menu -->
        <ul class="navbar-nav align-items-center">

            <!-- Wishlist -->
            <li class="nav-item me-3">
                <a class="nav-link position-relative" href="#">
                    <i class="bi bi-heart fs-5"></i>
                </a>
            </li>

            <!-- Cart -->
           <li class="nav-item me-3">
    <a class="nav-link position-relative" href="{{ route('cart.index') }}">

        <i class="bi bi-cart3 fs-4"></i>

        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

            {{ \App\Models\Cart::where('user_id', auth()->id())->sum('quantity') }}

        </span>

    </a>
</li>

            @guest

            <li class="nav-item">
                <a class="btn btn-outline-light me-2" href="{{ route('login') }}">
                    Login
                </a>
            </li>

            <li class="nav-item">
                <a class="btn btn-warning" href="{{ route('register') }}">
                    Register
                </a>
            </li>

            @endguest

            @auth

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle d-flex align-items-center"
                   href="#"
                   role="button"
                   data-bs-toggle="dropdown">

                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=random"
                         width="35"
                         class="rounded-circle me-2">

                    {{ auth()->user()->name }}

                </a>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-person"></i> My Profile
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-box"></i> My Orders
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-heart"></i> Wishlist
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button class="dropdown-item text-danger">

                                <i class="bi bi-box-arrow-right"></i>
                                Logout

                            </button>

                        </form>

                    </li>

                </ul>

            </li>

            @endauth

        </ul>

    </div>

</div>

</nav>
