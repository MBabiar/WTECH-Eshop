<x-app-layout>
    {{-- Login Form Container --}}
    <div class="form-container">
        <h1>Prihlásenie</h1>
        <hr />

        {{-- Login Form --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email  --}}
            <div class="mb-3 ">
                <div class="row">
                    <label for="email" class="col-3 col-form-label">Email</label>
                    <div class="col-8">
                        <input type="email" class="form-control" name="email" id="email"
                            value="{{ old('email') }}" placeholder="John@example.com" />
                    </div>
                </div>
                <x-input-error :messages="$errors->get('email')" class="li-left-align" />
            </div>

            {{-- Password --}}
            <div class="mb-3 ">
                <div class="row">
                    <label for="password" class="col-3 col-form-label">Heslo</label>
                    <div class="col-8">
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Heslo" />
                    </div>
                </div>
                <x-input-error :messages="$errors->get('password')" class="li-left-align" />
            </div>

            {{-- Login Button --}}
            <button type="submit" class="btn btn-primary">Prihlásiť sa</button>
        </form>
        <div class="register-link-container">
            <a class="register-link" href="{{ route('register') }}" class="badge bg-primary">Nová Registrácia</a>
            <a class="btn btn-link" href="{{ route('password.request') }}">Zabudli ste heslo?</a>
        </div>
    </div>
</x-app-layout>
