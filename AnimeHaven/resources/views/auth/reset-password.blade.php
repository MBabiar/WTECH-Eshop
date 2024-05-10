<x-app-layout>
    <div class="form-container">
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <input type="hidden" name="email" value="{{ $request->email }}">

            <!-- Password -->
            <div class="mb-3">
                <div class="row">
                    <label for="password" class="col-3 col-form-label">{{ __('Password') }}</label>
                    <div class="col-8">
                        <input id="password" class="form-control" type="password" name="password" required />
                    </div>
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <div class="row">
                    <label for="password_confirmation" class="col-3 col-form-label">{{ __('Confirm Password') }}</label>
                    <div class="col-8">
                        <input id="password_confirmation" class="form-control" type="password"
                            name="password_confirmation" required />
                    </div>
                </div>
            </div>

            <div class="flex items
            -center justify-end mt-4">
                <button class="btn btn-primary">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
