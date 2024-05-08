<nav class="navbar navbar-expand-sm bg-primary" aria-label="Main-Navigation">
    <div class="container justify-content-end">
        {{-- Collapse Button --}}
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Category Links --}}
        <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavId">
            <ul class="navbar-nav mt-2 mt-lg-0 list-group">
                <li class="list-group-item-start">
                    <a href="{{ route('product.index', ['category' => 'shirt']) }}"
                        class="nav-link-product-type">Tričká</a>
                </li>
                <li class="list-group-item-custom">
                    <a href="{{ route('product.index', ['category' => 'hoodie']) }}"
                        class="nav-link-product-type">Mikiny</a>
                </li>
                <li class="list-group-item-custom">
                    <a href="{{ route('product.index', ['category' => 'hat']) }}"
                        class="nav-link-product-type">Čiapky</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- Errors --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Success --}}
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
