<x-app-layout>
    <div
        class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-cyan-900 to-slate-900 relative p-4"
    >
        <sl-button
            variant="text"
            href="{{ route('login') }}"
            class="absolute top-4 left-4 [--sl-color-primary-600:white]"
        >
            Back to Login
        </sl-button>

        <div class="bg-white p-6 sm:p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-6 text-center">Reset Password</h2>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')"/>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="space-y-4">
                    <sl-input
                        name="email"
                        label="Email"
                        type="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                    ></sl-input>
                    <x-form-error for="email" class="mt-1"/>

                    <sl-button type="submit" variant="primary" class="w-full mt-6">
                        {{ __('Email Password Reset Link') }}
                    </sl-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
