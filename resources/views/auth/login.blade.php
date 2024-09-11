<x-app-layout>
    <div id="login-container" class="flex min-h-screen">
        <div class="relative flex-1 hidden items-center justify-center bg-gray-900 lg:flex">
            <div class="relative z-10 w-full max-w-md">
                <div class="space-y-3 text-center">
                    <h3 class="text-white text-3xl font-bold">Socio Manage</h3>
                    <p class="text-white font-semibold">Welcome back! Log in to access your account and manage your society
                        memberships.</p>
                    <p class="text-white font-semibold">Stay connected with your community!</p>
                </div>
            </div>
            <div
                class="absolute inset-0 my-auto h-full bg-gradient-radial from-cyan-900 to-slate-900"
            ></div>
        </div>
        <div class="flex-1 flex items-center justify-center">
            <div class="w-full max-w-md space-y-8 px-4 bg-white text-gray-600 sm:px-0">
                <div>
                    <h3 class="font-bold sm:text-3xl text-center">Log in</h3>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')"/>

                <form
                    class="space-y-5"
                    hx-post="{{ route('login') }}"
                    hx-target="#login-container"
                    hx-select="#login-container"
                    hx-swap="outerHTML"
                >
                    @csrf
                    <div>
                        <sl-input
                            id="email"
                            type="email"
                            name="email"
                            label="Email"
                            value="{{old('email')}}"
                            required
                            autofocus
                            autocomplete="username"
                            class="w-full mt-2"
                        ></sl-input>
                        <x-form-error for="email" class="mt-1"/>
                    </div>
                    <div>
                        <sl-input
                            id="password"
                            type="password"
                            name="password"
                            label="Password"
                            required
                            password-toggle
                            autocomplete="current-password"
                            class="w-full mt-2"
                        ></sl-input>
                        <x-form-error for="password" class="mt-1"/>
                    </div>
                    <sl-checkbox name="remember" id="remember_me">Remember me</sl-checkbox>
                    <div>
                        <sl-button type="submit" variant="primary" class="w-full mt-4">
                            Log in
                        </sl-button>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        @if (Route::has('password.request'))
                            <sl-button variant="text" href="{{ route('password.request') }}"
                                       class="[--sl-spacing-medium:0]">
                                Forgot your password?
                            </sl-button>
                        @endif
                        <sl-button variant="text" href="{{ route('register') }}" class="[--sl-spacing-medium:0]">
                            Create an account
                        </sl-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
