<x-app-layout>
    <form action="{{ route('store-order-info') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <section class="main-content">
            <div class="order-info-container">
                <div class="container-flex">
                    <h1>Osobné údaje</h1>
                    <div class="input-row mt-3">
                        <label for="inputName" class="col-label">Meno a Priezvisko</label>
                        <div class="col-input">
                            <input type="text" class="form-control" id="inputName"
                                value="{{ old('inputName', session('inputName')) }}" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Vyplň údaje.</div>
                        </div>
                    </div>
                    <div class="input-row">
                        <label for="inputEmail" class="col-label">Email</label>
                        <div class="col-input">
                            <input type="email" class="form-control" id="inputEmail" placeholder="example@gmail.com"
                                value="{{ old('inputEmail', session('inputEmail')) }}" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Vyplň údaje. example@gmail.com</div>
                        </div>
                    </div>

                    <div class="input-row">
                        <label for="inputTel" class="col-label">Telefón</label>
                        <div class="col-input">
                            <input type="tel" class="form-control" id="inputTel"
                                value="{{ old('inputTel', session('inputTel')) }}" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Vyplň údaje. 0xxx xxx xxx</div>
                        </div>
                    </div>
                    <hr />
                </div>
                <div class="container-flex mt-4">
                    <h1>Fakturačné údaje</h1>
                    <div class="input-row mt-3">
                        <label for="inputCountry" class="col-label">Krajina</label>
                        <div class="col-input">
                            <select class="form-select" id="inputCountry" name="inputCountry" required>
                                <option value="1"
                                    {{ old('inputCountry', session('inputCountry')) == '1' ? 'selected' : '' }}>
                                    Slovensko</option>
                                <option value="2"
                                    {{ old('inputCountry', session('inputCountry')) == '2' ? 'selected' : '' }}>Česká
                                    republika</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-row">
                        <label for="inputCity" class="col-label">Mesto</label>
                        <div class="col-input">
                            <input type="text" class="form-control" id="inputCity"
                                value="{{ old('inputCity', session('inputCity')) }}" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Vyplň údaje.</div>
                        </div>
                    </div>
                    <div class="input-row">
                        <label for="inputPsc" class="col-label">PSČ</label>
                        <div class="col-input">
                            <input type="number" class="form-control" id="inputPsc"
                                value="{{ old('inputPsc', session('inputPsc')) }}" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Vyplň údaje.</div>
                        </div>
                    </div>
                    <div class="input-row">
                        <label for="inputStreet" class="col-label">Ulica</label>
                        <div class="col-input">
                            <input type="text" class="form-control" id="inputStreet"
                                value="{{ old('inputStreet', session('inputStreet')) }}" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Vyplň údaje.</div>
                        </div>
                    </div>
                    <div class="input-row">
                        <label for="inputHouseNum" class="col-label">Číslo domu</label>
                        <div class="col-input">
                            <input type="number" class="form-control" id="inputHouseNum"
                                value="{{ old('inputHouseNum', session('inputHouseNum')) }}" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Vyplň údaje.</div>
                        </div>
                    </div>
                    <hr />
                </div>
            </div>
            <div class="ord-inf-buttons-container">
                <button id="ord-inf-back-button" type="button" class="ord-inf-back-button"
                    onclick="window.location.href='{{ route('delivery-payment') }}'">
                    Späť
                </button>
                <button type="submit" class="ord-inf-next-button"
                    onsubmit="window.location.href='{{ route('profile') }}'">
                    Ďalej
                </button>
            </div>
            <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function() {
                    'use strict';
                    let forms = document.querySelectorAll('.needs-validation');
                    Array.prototype.slice.call(forms).forEach(function(form) {
                        form.addEventListener(
                            'submit',
                            function(event) {
                                if (!form.checkValidity()) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            },
                            false
                        );
                    });
                })();
            </script>
        </section>
    </form>
</x-app-layout>
