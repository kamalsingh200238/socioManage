<x-dashboard-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pb-6">
        <!-- Profile Information Section -->
        <div class="p-4 sm:p-8 bg-white shadow-md rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header class="mb-4">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Profile Information') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Update your account's profile information and email address.") }}
                        </p>
                    </header>

                    <form
                        id="send-verification"
                        method="post"
                        action="{{ route('verification.send') }}"
                        hx-boost="true"
                    >
                        @csrf
                    </form>

                    <form
                        method="post"
                        action="{{ route('profile.update') }}"
                        class="mt-4 space-y-4"
                        hx-boost="true"
                    >
                        @csrf
                        @method('patch')

                        <div>
                            <sl-input
                                id="name"
                                name="name"
                                type="text"
                                label="Name"
                                size="small"
                                class="max-w-sm"
                                value="{{ old('name', $user->name) }}"
                                required
                                autocomplete="name"
                            ></sl-input>
                            <x-form-error class="mt-1" for="name"/>
                        </div>

                        <div>
                            <sl-input
                                id="email"
                                name="email"
                                type="email"
                                label="Email"
                                size="small"
                                class="max-w-sm"
                                value="{{ old('email', $user->email) }}"
                                required
                                autocomplete="username"
                            ></sl-input>
                            <x-form-error class="mt-1" for="email"/>

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div class="mt-1 text-sm">
                                    <p class="text-gray-800 flex items-center">
                                        {{ __('Your email address is unverified.') }}

                                        <sl-button
                                            variant="text"
                                            type="submit"
                                            size="small"
                                            form="send-verification"
                                        >
                                            {{ __('Click here to re-send the verification email.') }}
                                        </sl-button>
                                    </p>

                                    @if (session('status') === 'verification-link-sent')
                                        <p class="font-medium text-green-600">
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <div>
                            <sl-button type="submit" size="small" variant="primary">{{ __('Save') }}</sl-button>
                        </div>
                    </form>
                </section>
            </div>
        </div>

        <!-- Update Password Section -->
        <div class="p-4 sm:p-8 bg-white shadow-md rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header class="mb-4">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Update Password') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Ensure your account is using a long, random password to stay secure.') }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('password.update') }}" class="mt-4 space-y-4" hx-boost="true">
                        @csrf
                        @method('put')

                        <div>
                            <sl-input
                                id="current_password"
                                name="current_password"
                                type="password"
                                size="small"
                                label="{{__('Current Password')}}"
                                class="max-w-sm"
                                autocomplete="current-password"
                            ></sl-input>
                            <x-form-error
                                for="current_password"
                                class="mt-1"
                            />
                        </div>

                        <div>
                            <sl-input
                                id="password"
                                name="password"
                                type="password"
                                label="{{__('New Password')}}"
                                size="small"
                                class="max-w-sm"
                                autocomplete="new-password"
                            ></sl-input>
                            <x-form-error for="password" class="mt-1"/>
                        </div>

                        <div>
                            <sl-input
                                id="password_confirmation"
                                name="password_confirmation"
                                type="password"
                                label="{{__('Confirm Password')}}"
                                size="small"
                                class="max-w-sm"
                                autocomplete="new-password"
                            ></sl-input>
                            <x-form-error
                                for="password_confirmation"
                                class="mt-1"
                            />
                        </div>

                        <div class="flex items-center gap-4">
                            <sl-button type="submit" size="small" variant="primary">{{ __('Save') }}</sl-button>

                            <div id="password-status" class="text-sm text-gray-600 hidden"
                                 _="on load wait 2s then add .hidden">
                                {{ __('Saved.') }}
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>

        <!-- Delete Account Section -->
        <div class="p-4 sm:p-8 bg-white shadow-md rounded-lg">
            <div class="max-w-xl">
                <section class="space-y-4">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Delete Account') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                        </p>
                    </header>

                    <sl-button
                        variant="danger"
                        size="small"
                        _="on click call #confirm-user-deletion.show()"
                    >
                        {{ __('Delete Account') }}
                    </sl-button>

                    <sl-dialog
                        id="confirm-user-deletion"
                        label="{{ __('Are you sure you want to delete your account?') }}"
                        style="--width: 50vw"
                    >
                        <form id="confirm-deletion-form" method="post" action="{{ route('profile.destroy') }}" class="px-2" hx-boost="true">
                            @csrf
                            @method('delete')

                            <p class="text-sm text-gray-600">
                                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                            </p>

                            <div class="mt-6">
                                <sl-input
                                    id="password"
                                    name="password"
                                    type="password"
                                    size="small"
                                    label="{{ __('Password') }}"
                                    class="mx-w-sm"
                                    placeholder="{{ __('Password') }}"
                                    required
                                ></sl-input>
                                <x-form-error for="password" class="mt-1"/>
                            </div>
                        </form>

                        <div slot="footer" class="flex gap-2 items-center justify-end">
                            <sl-button
                                form="confirm-deletion-form"
                                type="submit"
                                variant="danger"
                                size="small"
                            >
                                {{ __('Delete Account') }}
                            </sl-button>
                            <sl-button
                                size="small"
                                _="on click call #confirm-user-deletion.hide()"
                            >
                                {{ __('Cancel') }}
                            </sl-button>
                        </div>
                    </sl-dialog>
                </section>
            </div>
        </div>
    </div>


    @if (session('status') === 'profile-updated')
        <sl-alert variant="success" duration="5000" closable _="init call my.toast()">
            <sl-icon slot="icon" name="check2-circle"></sl-icon>
            <strong>{{ __('Profile updated successfully.') }}</strong>
        </sl-alert>
    @endif

    @if (session('status') === 'password-updated')
        <sl-alert variant="success" duration="5000" closable _="init call my.toast()">
            <sl-icon slot="icon" name="check2-circle"></sl-icon>
            <strong>{{ __('Password updated successfully.') }}</strong>
        </sl-alert>
    @endif
</x-dashboard-layout>
