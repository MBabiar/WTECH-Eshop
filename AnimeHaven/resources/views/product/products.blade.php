<x-app-layout>
    {{-- Filter --}}
    <div class="container-fluid navbar navbar-expand-md justify-content-center mt-1 products-nav">
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            Spresniť parametre
            <span class="navbar-toggler-icon"></span>
        </button>
        <form action="{{ route('products', ['category' => $category]) }}" method="GET"
            class="navbar-collapse collapse row" id="navbarSupportedContent">
            {{-- Price --}}
            <div class="filter-col-input-buttons">
                <div class="filter-row-input-buttons">
                    <label for="price">Cena:</label>
                    <label for="price-min">Od</label>
                    <input type="number" id="price-min" name="price-min" min="0"
                        value="{{ request('price-min') ?? 0 }}" class="input-button-price" />
                    <label for="price-max">Do</label>
                    <input type="number" id="price-max" name="price-max" min="0"
                        value="{{ request('price-max') ?? 100 }}" class="input-button-price" />
                </div>
            </div>
            {{-- Anime --}}
            <div class="filter-col-other">
                <select class="form-select filter-row-other" id="anime" name="anime">
                    <option value="" {{ request('anime') === '' ? 'selected' : '' }} hidden>Anime</option>
                    <option value="Naruto" {{ request('anime') === 'Naruto' ? 'selected' : '' }}>Naruto</option>
                    <option value="Bleach" {{ request('anime') === 'Bleach' ? 'selected' : '' }}>Bleach</option>
                    <option value="Death Note" {{ request('anime') === 'Death Note' ? 'selected' : '' }}>Death Note
                    </option>
                </select>
            </div>
            {{-- Color --}}
            <div class="filter-col-other">
                <select class="form-select filter-row-other" id="color" name="color">
                    <option value="" {{ request('color') === '' ? 'selected' : '' }} hidden>Farba</option>
                    <option value="black" {{ request('color') === 'black' ? 'selected' : '' }}>Čierna</option>
                    <option value="white" {{ request('color') === 'white' ? 'selected' : '' }}>Biela</option>
                    <option value="blue" {{ request('color') === 'blue' ? 'selected' : '' }}>Modrá</option>
                </select>
            </div>
            {{-- Submit Button --}}
            <button type="submit" class="filter-col-btn filter-row-btn">Filtruj</button>
        </form>
    </div>

    {{-- Sort --}}
    <div class="container-fluid">
        <div class="row products-nav-2 mt-1 mb-1">
            <a href="{{ route('products', ['category' => $category, 'anime' => $anime, 'color' => $color, 'sort' => $sort]) }}"
                class="button-order {{ request('sort') === null ? 'button-active' : '' }}">Top</a>
            <a href="{{ route('products', ['category' => $category, 'anime' => $anime, 'color' => $color, 'sort' => 'price-asc']) }}"
                class="button-order {{ request('sort') === 'price-asc' ? 'button-active' : '' }}">Najlacnejšie</a>
            <a href="{{ route('products', ['category' => $category, 'anime' => $anime, 'color' => $color, 'sort' => 'price-desc']) }}"
                class="button-order {{ request('sort') === 'price-desc' ? 'button-active' : '' }}">Najdrahšie</a>
        </div>
    </div>
    {{-- Products --}}
    <div class="row products container-fluid">
        @foreach ($products as $product)
            <div class="col-md-6 mb-3 col-lg-4 col-sm-6 col-xl-3">
                <div class="card">
                    <a href="{{ route('product-detail') }}">
                        <img src="{{ asset($product->image) }}" class="card-img-top" alt="..." />
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

    {{-- Pagination --}}
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
