<x-app-layout>
    {{-- Product Detail --}}
    <div class="container mt-4">
        <h1 class="product-header-name">Mikina s kapucňou a neviem čo este treba vela pismenok</h1>
        <div class="row justify-content-center align-items-center">
            <div class="product-column">
                <div class="card">
                    <img class="card-img-top main-image" src="../images/tricko-bleach-1.png" alt="Title" />
                </div>
                <div class="row-sub-images">
                    <div class="col-sub-image">
                        <div class="card">
                            <img src="../images/tricko-bleach-1.png" class="sub-image" alt="Title" />
                        </div>
                    </div>
                    <div class="col-sub-image">
                        <div class="card">
                            <img src="../images/hoddie.jfif" class="sub-image" alt="Title" />
                        </div>
                    </div>
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
                    <p>
                        Bavlněná mikina, kterou ocení každý milovník anime Black Bulls. Atraktivní potisk
                        s motivem Black Bulls.
                    </p>
                    <p>Dlouhý rukáv, černé provedení, oboustranný potisk, dvojité prošití, 80% bavlna</p>
                </div>
                <br />
                <div class="container-flex">
                    <div class="row">
                        <p class="col-3" style="width: fit-content">Vyberte Veľkosť:</p>
                        <button type="button" class="col-2 mx-2 btn product-size-button">S</button>
                        <button type="button" class="col-2 mx-2 btn product-size-button">M</button>
                        <button type="button" class="col-2 mx-2 btn product-size-button">L</button>
                        <button type="button" class="col-2 mx-2 btn product-size-button">XL</button>
                        <script>
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
                    <p>Skladom (&gt;5ks)</p>
                    <div class="row">
                        <h1 class="col-product-price">10€</h1>
                        <div class="col-piece-add-to-cart">
                            <input title="amount" type="number" id="amount" class="input-piece-amount"
                                value="1" min="1" data-min="1" required />
                            <div class="container col-1">
                                <div class="row">
                                    <button type="button" class="inc-dec-button">↑</button>
                                </div>
                                <div class="row">
                                    <button type="button" class="inc-dec-button">↓</button>
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

                            <button type="button" class="col mx-3 btn btn-primary">
                                Pridať do košíka
                            </button>

                            <script>
                                var addToCartButton = document.getElementsByClassName('btn-primary')[0];
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
</x-app-layout>
