<x-app-layout>
    <div
        class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-cyan-900 to-slate-900 p-4"
    >
        <div class="bg-white p-6 sm:p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-6 text-center">Verify Email</h2>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="mt-4 space-y-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <sl-button type="submit" variant="primary" class="w-full">
                        {{ __('Resend Verification Email') }}
                    </sl-button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <sl-button type="submit" variant="text" class="w-full">
                        {{ __('Log Out') }}
                    </sl-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
