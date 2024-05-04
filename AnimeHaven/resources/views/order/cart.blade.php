<x-app-layout>
    <div class="product-container">
        <div class="product-row">
            <div class="col-image">
                <img src="../images/tricko-bleach-1.png" alt="" class="img-fluid" />
            </div>
            <div class="col-text">Tričko Bleach a ešte treba nejake pismenka do 50 slov</div>
            <div class="col-piece-amount">
                <input title="amount-1" type="number" id="amount-1" class="input-piece-amount" value="1"
                    min="1" data-min="1" required />
                <div class="container">
                    <div class="row">
                        <button type="button" id="inc-button-1" class="inc-dec-button">↑</button>
                    </div>
                    <div class="row">
                        <button type="button" id="dec-button-1" class="inc-dec-button">↓</button>
                    </div>
                </div>

                <script>
                    window.addEventListener('load', function() {
                        let amountInput_1 = document.getElementById('amount-1');
                        let incButton_1 = document.getElementById('inc-button-1');
                        let decButton_1 = document.getElementById('dec-button-1');

                        incButton_1.onclick = function() {
                            if (isNaN(parseInt(amountInput_1.value))) {
                                amountInput_1.value = 1;
                            } else {
                                amountInput_1.value = parseInt(amountInput_1.value) + 1;
                            }
                        };

                        decButton_1.onclick = function() {
                            if (parseInt(amountInput_1.value) > 1) {
                                amountInput_1.value = parseInt(amountInput_1.value) - 1;
                            }
                        };
                    });
                </script>
            </div>
            <div class="col-price">20€</div>
            <div class="col-delete">
                <button type="button" class="btn btn-danger">X</button>
            </div>
        </div>
    </div>

    <div class="product-container">
        <div class="product-row">
            <div class="col-image">
                <img src="../images/tricko-bleach-1.png" alt="" class="img-fluid" />
            </div>
            <div class="col-text">Tričko Bleach a ešte treba nejake pismenka do 50 slov</div>
            <div class="col-piece-amount">
                <input title="amount-2" type="number" id="amount-2" class="input-piece-amount" value="1"
                    min="1" data-min="1" required />
                <div class="container">
                    <div class="row">
                        <button type="button" id="inc-button-2" class="inc-dec-button">↑</button>
                    </div>
                    <div class="row">
                        <button type="button" id="dec-button-2" class="inc-dec-button">↓</button>
                    </div>
                </div>

                <script>
                    window.addEventListener('load', function() {
                        let amountInput_2 = document.getElementById('amount-2');
                        let incButton_2 = document.getElementById('inc-button-2');
                        let decButton_2 = document.getElementById('dec-button-2');

                        incButton_2.onclick = function() {
                            if (isNaN(parseInt(amountInput_2.value))) {
                                amountInput_2.value = 1;
                            } else {
                                amountInput_2.value = parseInt(amountInput_2.value) + 1;
                            }
                        };

                        decButton_2.onclick = function() {
                            if (parseInt(amountInput_2.value) > 1) {
                                amountInput_2.value = parseInt(amountInput_2.value) - 1;
                            }
                        };
                    });
                </script>
            </div>
            <div class="col-price">20€</div>
            <div class="col-delete">
                <button type="button" class="btn btn-danger">X</button>
            </div>
        </div>
    </div>

    <div class="order-button-container">
        <button type="button" class="order-button" onclick="window.location.href='{{ route('delivery-payment') }}'">
            Dalej
        </button>
    </div>
</x-app-layout>
