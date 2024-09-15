<x-app-layout>
    <div class="bg-gradient-to-br from-cyan-900 to-slate-900 min-h-screen text-white font-sans">
        <header class="container mx-auto px-4 py-6">
            <nav class="flex justify-between items-center">
                <sl-button hx-get="{{ url('/') }}" variant="text"
                           class="[--sl-color-primary-600:white] [--sl-button-font-size-large:1.875rem]" size="large"
                           hx-target="body"
                           hx-replace-url="true"
                >
                    Socio Manage
                </sl-button>
                <div hx-push-url="true">
                    @auth
                        <sl-button hx-get="{{ route('user.enrolled-societies') }}" hx-target="body">Dashboard
                        </sl-button>
                    @else
                        <sl-button variant="text" class="[--sl-color-primary-600:white] mr-3"
                                   hx-get="{{ route('login') }}" hx-target="body">Log in
                        </sl-button>
                        <sl-button hx-get="{{ route('register') }}" hx-target="body" class="font-bold">Register
                        </sl-button>
                    @endauth
                </div>
            </nav>
        </header>

        <main class="container mx-auto px-4 py-16" hx-push-url="true">
            <div class="text-center mb-16">
                <h1 class="text-5xl font-bold mb-6">Unlock Your University Experience</h1>
                <p class="text-xl mb-8">Join exclusive societies, attend amazing events, and make the most of your
                    campus life!</p>
                @auth
                    <sl-button hx-get="{{ route('user.enrolled-societies') }}" hx-target="body">Go to Dashboard
                    </sl-button>
                @else
                    <sl-button hx-get="{{ route('register') }}" hx-target="body">Get Started</sl-button>
                @endauth
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <div class="bg-white bg-opacity-10 p-6 rounded-lg">
                    <h2 class="text-2xl font-semibold mb-4">Join Socio Manage</h2>
                    <p>Register easily and explore a world of societies tailored to your interests. Connect with
                        like-minded peers and enhance your university experience.</p>
                </div>
                <div class="bg-white bg-opacity-10 p-6 rounded-lg">
                    <h2 class="text-2xl font-semibold mb-4">Access Exclusive Societies</h2>
                    <p>Gain membership to exclusive societies offering specialized resources, mentorship, and unique
                        networking opportunities with industry professionals.</p>
                </div>
                <div class="bg-white bg-opacity-10 p-6 rounded-lg">
                    <h2 class="text-2xl font-semibold mb-4">Enjoy Amazing Events</h2>
                    <p>Participate in a variety of events from workshops and lectures to social gatherings. Develop new
                        skills and create unforgettable memories.</p>
                </div>
            </div>

            <div class="text-center" hx-push-url="true">
                <h2 class="text-3xl font-bold mb-6">Ready to Elevate Your University Life?</h2>
                <p class="text-xl mb-8">Join Socio Manage today and unlock a world of opportunities!</p>
                @auth
                    <sl-button hx-get="{{ route('user.not-enrolled-societies') }}" hx-target="body">Explore Societies
                    </sl-button>
                @else
                    <sl-button hx-get="{{ route('register') }}" hx-target="body">Sign Up Now</sl-button>
                @endauth
            </div>
        </main>

        <footer class="container mx-auto px-4 py-6 text-center">
            <p>&copy; {{ date('Y') }} Socio Manage. All rights reserved.</p>
        </footer>
    </div>
</x-app-layout>
