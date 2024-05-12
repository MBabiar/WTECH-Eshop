<x-app-layout>
    @foreach ($products as $product)
        <div class="product-container">
            <div class="product-row">
                <div class="col-xl col-lg col-md-12 col-12">
                    <a href="{{ route('product.show', $product->id) }}" class="product-link">
                        <div class="col-image">
                            <img src="{{ asset($product->image) }}" alt="Product" class="img-fluid" />
                        </div>
                        <div class="col-text">
                            <div class="row">
                                <h3>{{ $product->name }}</h3>
                            </div>
                            <div class="row">
                                <p>Veľkosť: {{ $product->size }}</p>
                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-piece-amount">
                    <label for="amount{{ $product->variant_id }}" class="amount-label">Počet kusov:</label>
                    <input type="number" id="amount{{ $product->variant_id }}"
                        name="amounts[{{ $product->variant_id }}]" class="show-piece-amount"
                        value="{{ $product->amount }}" min="1" data-min="1" required readonly />
                    <div>
                        <form action="{{ route('cart.incrementAmount', $product->variant_id) }}" method="POST"
                            class="form-cart-row">
                            @csrf
                            <button type="submit" id="inc-button{{ $product->variant_id }}"
                                class="inc-dec-button-show">↑</button>
                        </form>
                        <form action="{{ route('cart.decrementAmount', $product->variant_id) }}" method="POST"
                            class="form-cart-row">
                            @csrf
                            <button type="submit" id="dec-button{{ $product->variant_id }}"
                                class="inc-dec-button-show">↓</button>
                        </form>
                    </div>
                </div>
                <div class="col-price">{{ $product->price * $product->amount }}€</div>
                <div class="col-delete">
                    <form action="{{ route('cart.destroy', $product->variant_id) }}" method="POST" class="p-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">X</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <div class="order-button-container">
        <button type="button" class="order-button" onclick="window.location.href='{{ route('delivery-payment') }}'">
            Ďalej
        </button>
    </div>
</x-app-layout>
