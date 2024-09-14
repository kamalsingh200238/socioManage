<x-app-layout>
    <div
        class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-cyan-900 to-slate-900 p-4"
    >
        <sl-button
            variant="text"
            href="{{ route('login') }}"
            class="absolute top-4 left-4 [--sl-color-primary-600:white]"
        >
            Back to login
        </sl-button>

        <div class="bg-white p-6 sm:p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-6 text-center">Reset Password</h2>
            <form
                method="POST"
                action="{{ route('password.store') }}"
                id="reset-password-form"
                hx-post="{{ route('password.store') }}"
                hx-target="this"
                hx-select="#reset-password-form"
            >
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="space-y-4">
                    <!-- Email Address -->
                    <div>
                        <sl-input
                            name="email"
                            label="Email"
                            type="email"
                            value="{{ old('email', $request->email) }}"
                            required
                            autofocus
                            autocomplete="username"
                        ></sl-input>
                        <x-form-error for="email" class="mt-1"/>
                    </div>

                    <!-- Password -->
                    <div>
                        <sl-input
                            name="password"
                            label="Password"
                            type="password"
                            required
                            autocomplete="new-password"
                        ></sl-input>
                        <x-form-error for="password" class="mt-1"/>
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <sl-input
                            name="password_confirmation"
                            label="Confirm Password"
                            type="password"
                            required
                            autocomplete="new-password"
                        ></sl-input>
                        <x-form-error for="password_confirmation" class="mt-1"/>
                    </div>
                </div>

                <sl-button type="submit" variant="primary" class="w-full mt-4">Reset Password</sl-button>
            </form>
        </div>
    </div>
</x-app-layout>


