<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>

                <a class="nav-item nav-link {{ Request::is('category') ? 'active' : '' }}" href="{{ url('category') }}">Category</a>

                <a class="nav-item nav-link {{ Request::is('products') ? 'active' : '' }}" href="{{ url('products') }}">Products</a>
            </div>
        </div>
    </div>
</nav>