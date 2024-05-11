<x-app-layout>
    {{-- Product Detail --}}
    <div class="container mt-4">
        <h1 class="product-header-name">{{ $product->name }}</h1>
        <div class="row justify-content-center align-items-center">
            <div class="product-column-images">
                <div class="card">
                    <img class="card-img-top main-image" src="{{ asset(optional($product->images->first())->image) }}"
                        alt="Title" />
                </div>
                <div class="row-sub-images">
                    @foreach ($product->images as $image)
                        <div class="col-sub-image">
                            <div class="card">
                                <img src="{{ asset($image->image) }}" class="sub-image" alt="Title" />
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="product-column-details">
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="container-flex mt-3">
                        {{ $product->description }}
                    </div>
                    <br />
                    <div class="container-flex">
                        <div class="row">
                            <p class="col-12">Vyberte Veľkosť:</p>
                            @foreach ($variants as $variant)
                                @if ($loop->first)
                                    <label class="product-size-button button-active">
                                        <input type="radio" name="size" id="size{{ $variant->size }}"
                                            value="{{ $variant->size }}" checked>
                                        {{ $variant->size }}
                                    </label>
                                @else
                                    <label class="product-size-button">
                                        <input type="radio" name="size" id="size{{ $variant->size }}"
                                            value="{{ $variant->size }}">
                                        {{ $variant->size }}
                                    </label>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <br />
                    <div class="container mb-3">
                        <p id="stock-display">
                            @if ($variants->first()->stock <= 0)
                                Nedostupné
                            @elseif ($variants->first()->stock <= 5)
                                Skladom ({{ $variants->first()->stock }}ks)
                            @else
                                Skladom (&gt;5ks)
                            @endif
                        </p>
                        <div class="row">
                            <h1 class="col-product-price">{{ $product->price }}€ /ks</h1>
                            <div class="col-piece-add-to-cart">
                                <div class="row-piece-input">
                                    <input type="number" id="amount" name="amount" class="input-piece-amount"
                                        value="1" min="1" data-min="1" required>
                                    </input>

                                    <div class="col">
                                        <div class="row">
                                            <button type="button" id="inc-button" class="inc-dec-button">↑</button>
                                        </div>
                                        <div class="row">
                                            <button type="button" id="dec-button" class="inc-dec-button">↓</button>
                                        </div>
                                    </div>
                                </div>

                                <button id="addToCartButton" type="submit" class="add-to-cart-btn">
                                    Pridať do košíka
                                </button>

                            </div>
                        </div>
                    </div>
                </form>

                {{-- Admin Buttons --}}
                @if (Auth::user() && Auth::user()->isAdmin())
                    <div class="container">
                        <div class="row justify-content-center">
                            <a class="admin-btn btn-warning" href="{{ route('product.edit', $product) }}">
                                Upraviť
                            </a>
                            <form id="admin-delete" action="{{ route('product.destroy', $product) }}" method="POST"
                                class="delete-product-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="admin-btn btn-danger">Vymazať</button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>

    {{-- Scripts --}}
    <script type="text/javascript">
        window.productId = @json($product->id);
    </script>
    @vite(['resources/js/product/show.js']);
</x-app-layout>
