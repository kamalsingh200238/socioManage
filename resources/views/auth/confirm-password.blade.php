<x-app-layout>
    <div
        class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-cyan-900 to-slate-900 p-4"
    >
        <div class="bg-white p-6 sm:p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-6 text-center">Confirm Password</h2>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="space-y-4">
                    <!-- Password -->
                    <div>
                        <sl-input
                            name="password"
                            type="password"
                            label="{{ __('Password') }}"
                            required
                            autocomplete="current-password"
                        ></sl-input>
                        <x-form-error for="password" class="mt-1"/>
                    </div>

                    <sl-button type="submit" variant="primary" class="w-full">
                        {{ __('Confirm') }}
                    </sl-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
