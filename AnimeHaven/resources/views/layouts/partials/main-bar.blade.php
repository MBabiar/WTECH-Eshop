<nav class="navbar navbar-light bg-dark" aria-label="Main-Bar">
    <div class="container-fluid">
        {{-- Logo --}}
        <a href="{{ route('homepage') }}" class="main-logo">
            <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="" />
        </a>

        {{-- Search --}}
        <form class="main-search d-flex">
            <input class="form-control me-2" type="search" placeholder="Vyhľadať" aria-label="Search" />
            <button class="btn btn-outline-success" type="submit">Vyhľadať</button>
        </form>

        {{-- Profile Navigation --}}
        <div class="prof-cart-link">
            {{-- Profile --}}
            <div class="col nav-link">
                <img src="{{ asset('images/profile_placeholder.png') }}" class="img-fluid profile-img" alt=""
                    data-bs-toggle="modal" data-bs-target="#ProfileModal" />
                <div class="modal fade" id="ProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content dropdown-menu">
                            {{-- TODO: Add route to Profile --}}
                            <a class="dropdown-item" href="user-profile.html">Profil</a>
                            @if (Auth::check())
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Odhlásiť sa</button>
                                </form>
                            @else
                                <a class="dropdown-item" href="{{ route('login') }}">Prihlásiť sa</a>
                                <a class="dropdown-item" href="{{ route('register') }}">Registrovať sa</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Cart --}}
            {{-- TODO: Add route to cart --}}
            <a href="cart.html" class="col nav-link">
                <img src="{{ asset('images/shopping_cart.png') }}" class="img-fluid" alt="" />
            </a>
        </div>
    </div>
</nav>
