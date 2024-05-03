<nav class="navbar navbar-light bg-dark" aria-label="Main-Bar">
    <div class="container-fluid">
        {{-- Logo --}}
        <a href="homepage.html" class="main-logo">
            <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="" />
        </a>

        {{-- Search --}}
        <form class="main-search d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn btn-outline-success" type="submit">Search</button>
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
                            <a class="dropdown-item" href="user-profile.html">Profil</a>
                            <a class="dropdown-item" href="login.html">Prihlásiť sa</a>
                            <a class="dropdown-item" href="register.html">Registrovať sa</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Cart --}}
            <a href="cart.html" class="col nav-link">
                <img src="{{ asset('images/shopping_cart.png') }}" class="img-fluid" alt="" />
            </a>
        </div>
    </div>
</nav>
