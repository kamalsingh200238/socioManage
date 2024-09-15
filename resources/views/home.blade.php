<x-app-layout>
    <div class="bg-gradient-to-br from-cyan-900 to-slate-900 min-h-screen text-white font-sans">
        <header class="container mx-auto px-4 py-6">
            <nav class="flex flex-col sm:flex-row justify-between items-center">
                <sl-button hx-get="{{ url('/') }}" variant="text"
                           class="[--sl-color-primary-600:white] [--sl-button-font-size-large:1.5rem] sm:[--sl-button-font-size-large:1.875rem] mb-4 sm:mb-0"
                           size="large"
                           hx-target="body"
                           hx-replace-url="true"
                >
                    Socio Manage
                </sl-button>
                <div hx-push-url="true" class="flex flex-wrap justify-center sm:justify-end">
                    @auth
                        <sl-button hx-get="{{ route('user.enrolled-societies') }}" hx-target="body"
                                   class="w-full sm:w-auto mb-2 sm:mb-0">Dashboard
                        </sl-button>
                    @else
                        <sl-button variant="text" class="[--sl-color-primary-600:white] mr-3 mb-2 sm:mb-0"
                                   hx-get="{{ route('login') }}" hx-target="body">Log in
                        </sl-button>
                        <sl-button hx-get="{{ route('register') }}" hx-target="body" class="font-bold w-full sm:w-auto">
                            Register
                        </sl-button>
                    @endauth
                </div>
            </nav>
        </header>

        <main class="container mx-auto px-4 py-8 sm:py-16" hx-push-url="true">
            <div class="text-center mb-12 sm:mb-16">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 sm:mb-6">Unlock Your University
                    Experience</h1>
                <p class="text-lg sm:text-xl mb-6 sm:mb-8">Join exclusive societies, attend amazing events, and make the
                    most of your campus life!</p>
                @auth
                    <sl-button hx-get="{{ route('user.enrolled-societies') }}" hx-target="body"
                               class="w-full sm:w-auto">Go to Dashboard
                    </sl-button>
                @else
                    <sl-button hx-get="{{ route('register') }}" hx-target="body" class="w-full sm:w-auto">Get Started
                    </sl-button>
                @endauth
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mb-12 sm:mb-16">
                <div class="bg-white bg-opacity-10 p-4 sm:p-6 rounded-lg">
                    <h2 class="text-xl sm:text-2xl font-semibold mb-3 sm:mb-4">Join Socio Manage</h2>
                    <p class="text-sm sm:text-base">Register easily and explore a world of societies tailored to your
                        interests. Connect with like-minded peers and enhance your university experience.</p>
                </div>
                <div class="bg-white bg-opacity-10 p-4 sm:p-6 rounded-lg">
                    <h2 class="text-xl sm:text-2xl font-semibold mb-3 sm:mb-4">Access Exclusive Societies</h2>
                    <p class="text-sm sm:text-base">Gain membership to exclusive societies offering specialized
                        resources, mentorship, and unique networking opportunities with industry professionals.</p>
                </div>
                <div class="bg-white bg-opacity-10 p-4 sm:p-6 rounded-lg">
                    <h2 class="text-xl sm:text-2xl font-semibold mb-3 sm:mb-4">Enjoy Amazing Events</h2>
                    <p class="text-sm sm:text-base">Participate in a variety of events from workshops and lectures to
                        social gatherings. Develop new skills and create unforgettable memories.</p>
                </div>
            </div>

            <div class="text-center" hx-push-url="true">
                <h2 class="text-2xl sm:text-3xl font-bold mb-4 sm:mb-6">Ready to Elevate Your University Life?</h2>
                <p class="text-lg sm:text-xl mb-6 sm:mb-8">Join Socio Manage today and unlock a world of
                    opportunities!</p>
                @auth
                    <sl-button hx-get="{{ route('user.not-enrolled-societies') }}" hx-target="body"
                               class="w-full sm:w-auto">Explore Societies
                    </sl-button>
                @else
                    <sl-button hx-get="{{ route('register') }}" hx-target="body" class="w-full sm:w-auto">Sign Up Now
                    </sl-button>
                @endauth
            </div>
        </main>

        <footer class="container mx-auto px-4 py-6 text-center text-sm sm:text-base">
            <p>&copy; {{ date('Y') }} Socio Manage. All rights reserved.</p>
        </footer>
    </div>
</x-app-layout>
