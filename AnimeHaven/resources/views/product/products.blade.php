<x-app-layout>
    {{-- Filter --}}
    <div class="container-fluid navbar navbar-expand-md justify-content-center mt-1 products-nav">
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            Spresniť parametre
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse row" id="navbarSupportedContent">
            <div class="col-md-5 filter-col-input-buttons">
                <div>
                    <label for="price">Cena:</label>
                    <label for="Od">Od</label>
                    <input type="number" id="Od" name="Od" class="input-button-price" />
                    <label for="Do">Do</label>
                    <input type="number" id="Do" name="Do" class="input-button-price" />
                </div>
            </div>
            <div class="col-md-4 filter-col-anime">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Anime
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Bleach</a></li>
                        <li><a class="dropdown-item" href="#">Naruto</a></li>
                        <li><a class="dropdown-item" href="#">Death Note</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 filter-col-color">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Farba
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Čierna</a></li>
                        <li><a class="dropdown-item" href="#">Biela</a></li>
                        <li><a class="dropdown-item" href="#">Červená</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Sort --}}
    <div class="container-fluid">
        <div class="row products-nav-2 mt-1 mb-1">
            <a href="{{ route('products', ['category' => $category]) }}"
                class="button-order {{ request('sort') === null ? 'button-active' : '' }}">Top</a>
            <a href="{{ route('products', ['category' => $category, 'sort' => 'asc']) }}"
                class="button-order {{ request('sort') === 'asc' ? 'button-active' : '' }}">Najlacnejšie</a>
            <a href="{{ route('products', ['category' => $category, 'sort' => 'desc']) }}"
                class="button-order {{ request('sort') === 'desc' ? 'button-active' : '' }}">Najdlhšie</a>
            <script>
                let ordButtons = document.querySelectorAll('.button-order');

                ordButtons.forEach((button) => {
                    button.addEventListener('click', function() {
                        ordButtons.forEach((btn) => {
                            btn.classList.remove('button-active');
                        });

                        this.classList.add('button-active');
                    });
                });
            </script>
        </div>
    </div>

    {{-- Products --}}
    <div class="row products container-fluid">
        @foreach ($products as $product)
            <div class="col-md-6 mb-3 col-lg-4 col-sm-6 col-xl-3">
                <div class="card">
                    <a href="{{ route('product-detail') }}">
                        <img src="../images/tricko-bleach-1.png" class="card-img-top" alt="..." />
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $product->name }}
                        </h5>
                        <p class="card-text">Cena: {{ $product->price }}€</p>
                        <a href="#" class="btn btn-primary">Do košíka</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Paging --}}
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</x-app-layout>
