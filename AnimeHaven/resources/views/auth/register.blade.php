<x-app-layout>
    {{-- Logo --}}
    <x-logo-image></x-logo-image>

    {{-- Register Form --}}
    <div class="form-container">
        <h1>Registrácia</h1>
        <hr />
        <form>
            <div class="mb-3 row">
                <label for="inputEmail" class="col-3 col-form-label">Email</label>
                <div class="col-8">
                    <input type="email" class="form-control" name="inputEmail" id="inputEmail"
                        placeholder="John@example.com" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-3 col-form-label">Heslo</label>
                <div class="col-8">
                    <input type="password" class="form-control" name="inputPassword" id="inputPassword"
                        placeholder="Heslo" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword2" class="col-3 col-form-label">Potvrdenie Hesla</label>
                <div class="col-8">
                    <input type="password" class="form-control" name="inputPassword2" id="inputPassword2"
                        placeholder="Heslo" />
                </div>
            </div>
        </form>
        <button type="button" class="btn btn-primary">Zaregistrovať sa</button>
    </div>
</x-app-layout>
