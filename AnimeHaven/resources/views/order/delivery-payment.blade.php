<x-app-layout>
    <form action="{{ route('store-delivery-payment') }}" method="POST" class="p-0">
        @csrf
        <section class="main-content content">
            <div class="delivery-payment-container">
                <div class="container-flex">
                    <h1>Doprava</h1>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="transportation" value="packeta_home"
                            id="packeta_home"
                            {{ old('transportation', session('transportation')) == 'packeta_home' ? 'checked' : '' }} />
                        <label class="form-check-label" for="packeta_home"> Doručenie Domov - Packeta Home </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="transportation" value="sps"
                            id="sps"
                            {{ old('transportation', session('transportation')) == 'sps' ? 'checked' : '' }} />
                        <label class="form-check-label" for="sps">
                            Doručenie Domov - SPS Slovak Parcel Service
                        </label>
                    </div>
                </div>
                <div class="container-flex mt-4">
                    <h1>Platba</h1>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" value="card_payment"
                            id="card_payment"
                            {{ old('payment_method', session('payment_method')) == 'card_payment' ? 'checked' : '' }} />
                        <label class="form-check-label" for="card_payment"> Online Platba Kartou </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" value="google_pay"
                            id="google_pay"
                            {{ old('payment_method', session('payment_method')) == 'google_pay' ? 'checked' : '' }} />
                        <label class="form-check-label" for="google_pay"> Google Pay </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" value="cash_on_delivery"
                            id="cash_on_delivery"
                            {{ old('payment_method', session('payment_method')) == 'cash_on_delivery' ? 'checked' : '' }} />
                        <label class="form-check-label" for="cash_on_delivery"> Dobierkou na mieste </label>
                    </div>
                </div>
            </div>
            <div class="del-pay-buttons-container">
                <button id="del-pay-back-button" type="button" class="del-pay-back-button"
                    onclick="window.location.href='{{ route('cart.show') }}'">
                    Späť
                </button>
                <button type="submit" class="del-pay-next-button">
                    Ďalej
                </button>
            </div>
        </section>
    </form>
</x-app-layout>
