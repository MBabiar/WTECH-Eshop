<x-app-layout>
    <div class="form-container">
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <div class="row">
                    <label for="email" class="col-3 col-form-label">{{ __('Email') }}</label>
                    <div class="col-8">
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')"
                            required autofocus />
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button class="btn btn-primary">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>

</x-app-layout>
