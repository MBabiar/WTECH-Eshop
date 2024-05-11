<x-app-layout>
    <form action="{{ route('store-delivery-payment') }}" method="POST" class="p-0">
        @csrf
        <section class="main-content content">
            <div class="delivery-payment-container">
                <div class="container-flex">
                    <h1>Doprava</h1>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="transportation" value="" id=""
                            checked />
                        <label class="form-check-label" for=""> Doručenie Domov - Packeta Home </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="transportation" value=""
                            id="" />
                        <label class="form-check-label" for="">
                            Doručenie Domov - SPS Slovak Parcel Service
                        </label>
                    </div>
                </div>
                <div class="container-flex mt-4">
                    <h1>Platba</h1>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" value=""
                            id="" checked />
                        <label class="form-check-label" for=""> Online Platba Kartou </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" value=""
                            id="" />
                        <label class="form-check-label" for=""> Google Pay </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" value=""
                            id="" />
                        <label class="form-check-label" for=""> Dobierkou na mieste </label>
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
