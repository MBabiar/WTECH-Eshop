<x-app-layout>
    {{-- Product Detail --}}
    <div class="container mt-4">
        <h1 class="product-header-name">{{ $product->name }}</h1>
        <div class="row justify-content-center align-items-center">
            <div class="product-column-images">
                <div class="card">
                    <img class="card-img-top main-image" src="{{ asset($product->images->first()->image) }}"
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
                <script>
                    let mainImage = document.querySelector('.main-image');
                    let subImages = document.querySelectorAll('.sub-image');

                    subImages.forEach((image) => {
                        image.addEventListener('click', function() {
                            mainImage.src = this.src;
                        });
                    });
                </script>
            </div>

            <div class="product-column-details">
                <div class="container-flex mt-3">
                    {{ $product->description }}
                </div>
                <br />
                <div class="container-flex">
                    <div class="row">
                        <p class="col-12">Vyberte Veľkosť:</p>
                        @foreach ($variants as $variant)
                            <label class="product-size-button">
                                <input type="radio" name="size" id="size{{ $variant->size }}"
                                    value="{{ $variant->size }}" autocomplete="off" checked> {{ $variant->size }}
                            </label>
                        @endforeach

                        <script>
                            console.log(@json($variants));
                            let ordButtons = document.querySelectorAll('.product-size-button');

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
                <br />
                <div class="container mb-3">
                    <p id="stock-display">Skladom (&gt;5ks)</p>
                    <div class="row">
                        <h1 class="col-product-price">{{ $product->price }}€</h1>
                        <div class="col-piece-add-to-cart">
                            <div class="row-piece-input">
                                <input title="amount" type="number" id="amount" class="input-piece-amount"
                                    value="1" min="1" data-min="1" required />

                                <div class="col">
                                    <div class="row">
                                        <button type="button" class="inc-dec-button">↑</button>
                                    </div>
                                    <div class="row">
                                        <button type="button" class="inc-dec-button">↓</button>
                                    </div>
                                </div>
                            </div>

                            <script>
                                window.onload = function() {
                                    let amountInput = document.getElementById('amount');
                                    let incButton = document.getElementsByClassName('inc-dec-button')[0];
                                    let decButton = document.getElementsByClassName('inc-dec-button')[1];

                                    incButton.onclick = function() {
                                        if (isNaN(parseInt(amountInput.value))) {
                                            amountInput.value = 1;
                                        } else {
                                            amountInput.value = parseInt(amountInput.value) + 1;
                                        }
                                    };

                                    decButton.onclick = function() {
                                        if (parseInt(amountInput.value) > 1) {
                                            amountInput.value = parseInt(amountInput.value) - 1;
                                        }
                                    };
                                };
                            </script>

                            <button id="addToCartButton" type="button" class="add-to-cart-btn">
                                Pridať do košíka
                            </button>

                            <script>
                                let addToCartButton = document.getElementById('addToCartButton');
                                addToCartButton.onclick = function() {
                                    let amount = parseInt(document.getElementById('amount').value);
                                    if (amount <= 0) {
                                        alert('Nesprávne množstvo');
                                    } else if (amount > 0) {
                                        alert('Pridané do košíka');
                                    }
                                };
                            </script>
                        </div>
                    </div>
                </div>
                {{-- Admin Buttons --}}
                <div class="container">
                    <div class="row justify-content-center">
                        <button type="button" class="col-3 mx-2 btn btn-warning"
                            onclick="window.location.href='admin/admin_change.html'">
                            Upraviť
                        </button>
                        <button type="button" class="col-3 mx-2 btn btn-danger"
                            onclick="window.location.href='admin/admin_delete_img.html'">
                            Vymazať obrázok
                        </button>
                        <button type="button" class="col-3 mx-2 btn btn-danger">Vymazať</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.productId = @json($product->id);
        fetchProductVariants();
    </script>
</x-app-layout>
