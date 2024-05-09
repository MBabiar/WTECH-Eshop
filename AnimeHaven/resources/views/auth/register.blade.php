<x-app-layout>
    {{-- Register Form Container --}}
    <div class="form-container">
        <h1>Registrácia</h1>
        <hr />

        {{-- Register Form --}}
        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Email  --}}
            <div class="mb-3">
                <div class="row">
                    <label for="email" class="col-3 col-form-label">Email</label>
                    <div class="col-8">
                        <input type="email" class="form-control" name="email" id="email"
                            value="{{ old('email') }}" placeholder="John@example.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="li-left-align" />
                </div>
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <div class=" row">
                    <label for="password" class="col-3 col-form-label">Heslo</label>
                    <div class="col-8">
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Heslo" />
                    </div>
                </div>
                <x-input-error :messages="$errors->get('password')" class="li-left-align" />
            </div>

            {{-- Confirm Password --}}
            <div class="mb-3">
                <div class=" row">
                    <label for="password_confirmation" class="col-3 col-form-label">Potvrdenie Hesla</label>
                    <div class="col-8">
                        <input type="password" class="form-control" name="password_confirmation"
                            id="password_confirmation" placeholder="Heslo" />
                    </div>
                </div>
            </div>

            {{-- Register Button --}}
            <button type="submit" class="btn btn-primary">Zaregistrovať sa</button>
        </form>
    </div>
</x-app-layout>
