<x-app-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <input type="hidden" name="email" value="{{ $request->email }}">

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="block font-medium text-sm text-gray-700">{{ __('Password') }}</label>
            <input id="password" class="block mt-1 w-full" type="password" name="password" required />
            @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation"
                class="block font-medium text-sm text-gray-700">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
                required />
        </div>

        <div class="flex items
        -center justify-end mt-4">
            <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500">
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>
</x-app-layout>
