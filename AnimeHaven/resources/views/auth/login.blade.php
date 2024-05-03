<x-app-layout>
    {{-- Logo --}}
    <x-logo-image></x-logo-image>

    {{-- Login Form --}}
    <div class="form-container">
        <h1>Prihlásenie</h1>
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
        </form>
        <button type="button" class="btn btn-primary">Login</button>
        <br />
        <div class="register-link-container">
            <a class="register-link" href="register.html" class="badge bg-primary">Nová Registrácia</a>
        </div>
    </div>
</x-app-layout>
