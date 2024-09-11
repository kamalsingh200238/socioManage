<x-app-layout>
    <div id="register-container" class="flex min-h-screen">
        <div class="relative flex-1 hidden items-center justify-center bg-gray-900 lg:flex">
            <div class="relative z-10 w-full max-w-md">
                <div class="space-y-3 text-center">
                    <h3 class="text-white text-3xl font-bold">Socio Manage</h3>
                    <p class="text-white font-semibold">Create an account to explore and register for a variety of vibrant
                        societies that match your interests.</p>
                    <p class="text-white font-semibold">Experience community engagement like never before</p>
                </div>
            </div>
            <div
                class="absolute inset-0 my-auto h-full bg-gradient-radial from-cyan-900 to-slate-900"
            ></div>
        </div>
        <div class="flex-1 flex items-center justify-center">
            <div class="w-full max-w-md space-y-8 px-4 bg-white text-gray-600 sm:px-0">
                <div>
                    <h3 class="text-gray-800 text-2xl font-bold sm:text-3xl text-center">Sign up</h3>
                </div>
                <form class="space-y-5" hx-post="{{ route('register') }}" hx-target="#register-container"
                      hx-select="#register-container" hx-swap="outerHTML">
                    @csrf
                    <div>
                        <sl-input
                            id="name"
                            type="text"
                            name="name"
                            label="Name"
                            value="{{old('name')}}"
                            required
                            autofocus
                        ></sl-input>
                        <x-form-error for="name" class="mt-1"></x-form-error>
                    </div>
                    <div>
                        <sl-input
                            id="email"
                            type="email"
                            name="email"
                            label="Email"
                            value="{{old('email')}}"
                            required
                        ></sl-input>
                        <x-form-error for="email" class="mt-1"></x-form-error>
                    </div>
                    <div>
                        <sl-input
                            id="password"
                            type="password"
                            name="password"
                            label="Password"
                            required
                            password-toggle
                        ></sl-input>
                        <x-form-error for="password" class="mt-1"></x-form-error>
                    </div>
                    <div>
                        <sl-input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            label="Confirm Password"
                            required
                            password-toggle
                        ></sl-input>
                        <x-form-error for="password_confirmation" class="mt-1"></x-form-error>
                    </div>
                    <div>
                        <sl-button type="submit" variant="primary" class="w-full mt-4">
                            Create account
                        </sl-button>
                    </div>
                    <p class="text-center">
                        Already have an account?
                        <sl-button variant="text" href="{{ route('login') }}" class="[--sl-spacing-medium:0]">Log in
                        </sl-button>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
