<x-app-layout>
    <form action="{{ route('order.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <section class="main-content">
            <div class="order-info-container">
                <div class="container-flex">
                    <h1>Osobné údaje</h1>
                    <div class="input-row mt-3">
                        <label for="user_name" class="col-label">Meno a Priezvisko</label>
                        <div class="col-input">
                            <input type="text" class="form-control" id="user_name" name="user_name"
                                value="{{ old('user_name', session('user_name')) }}" required pattern="^[a-zA-Z\s]*$" />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Vyplň údaje.</div>
                        </div>
                    </div>
                    <div class="input-row">
                        <label for="user_email" class="col-label">Email</label>
                        <div class="col-input">
                            @auth
                                <input type="email" class="form-control" id="user_email" name="user_email"
                                    value="{{ auth()->user()->email }}" readonly />
                            @else
                                <input type="email" class="form-control" id="user_email" name="user_email"
                                    placeholder="example@gmail.com" value="{{ old('user_email', session('user_email')) }}"
                                    required pattern="^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]{2,}$" />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Vyplň údaje. example@gmail.com</div>
                            @endauth
                        </div>
                    </div>

                    <div class="input-row">
                        <label for="user_phone" class="col-label">Telefón</label>
                        <div class="col-input">
                            <input type="tel" class="form-control" id="user_phone" name="user_phone"
                                value="{{ old('user_phone', session('user_phone')) }}" required
                                pattern="^[0-9]{3}\s[0-9]{3}\s[0-9]{3}$" />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Vyplň údaje.xxx xxx xxx</div>
                        </div>
                    </div>
                    <hr />
                </div>
                <div class="container-flex mt-4">
                    <h1>Fakturačné údaje</h1>
                    <div class="input-row mt-3">
                        <label for="user_country" class="col-label">Krajina</label>
                        <div class="col-input">
                            <select class="form-select" id="user_country" name="user_country" required>
                                <option value="Slovakia"
                                    {{ old('user_country', session('user_country')) == '1' ? 'selected' : '' }}>
                                    Slovensko</option>
                                <option value="Czech Republic"
                                    {{ old('user_country', session('user_country')) == '2' ? 'selected' : '' }}>Česká
                                    republika</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-row">
                        <label for="user_city" class="col-label">Mesto</label>
                        <div class="col-input">
                            <input type="text" class="form-control" id="user_city" name="user_city"
                                value="{{ old('user_city', session('user_city')) }}" required pattern="^[a-zA-Z\s]*$" />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Vyplň údaje.</div>
                        </div>
                    </div>
                    <div class="input-row">
                        <label for="user_zip" class="col-label">PSČ</label>
                        <div class="col-input">
                            <input type="number" class="form-control" id="user_zip" name="user_zip"
                                value="{{ old('user_zip', session('user_zip')) }}" required
                                pattern="^[0-9]{2}-[0-9]{3}$" />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Vyplň údaje.</div>
                        </div>
                    </div>
                    <div class="input-row">
                        <label for="user_street" class="col-label">Ulica</label>
                        <div class="col-input">
                            <input type="text" class="form-control" id="user_street" name="user_street"
                                value="{{ old('user_street', session('user_street')) }}" required
                                pattern="^[a-zA-Z\s]*$" />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Vyplň údaje.</div>
                        </div>
                    </div>
                    <div class="input-row">
                        <label for="user_house_number" class="col-label">Číslo domu</label>
                        <div class="col-input">
                            <input type="number" class="form-control" id="user_house_number" name="user_house_number"
                                value="{{ old('user_house_number', session('user_house_number')) }}" required />
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
                    Objednať
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
