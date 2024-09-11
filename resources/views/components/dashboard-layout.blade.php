<x-app-layout>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-60 bg-slate-900 text-white px-2 flex flex-col">
            <p class="p-4 text-2xl font-bold">
                Dashboard
            </p>
            <nav class="mt-8 space-y-2 text-sm" hx-boost="true">
                @if(auth()->user()->isCoordinator())
                    <x-sidebar-link
                        href="{{route('coordinator.dashboard')}}"
                        :active="request()->routeIs('coordinator.dashboard')"
                    >
                        Coordinator Dashboard
                    </x-sidebar-link>
                @endif
                    <x-sidebar-link
                        href="{{route('user.enrolled-societies')}}"
                        :active="request()->routeIs('user.enrolled-societies')"
                    >
                        Enrolled Societies
                    </x-sidebar-link>
                    <x-sidebar-link
                        href="{{route('user.not-enrolled-societies')}}"
                        :active="request()->routeIs('user.not-enrolled-societies')"
                    >
                        Not Enrolled Societies
                    </x-sidebar-link>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto">
            <!-- Top bar -->
            <header class="bg-white shadow-md">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800">Welcome, {{ auth()->user()->name ?? "Guest" }}</h2>
                    <div class="flex items-center space-x-4">
                        <sl-dropdown placement="bottom-end">
                            <sl-avatar slot="trigger" label="user avatar" class="[--size:2rem]"></sl-avatar>
                            <sl-menu>
                                <sl-menu-item value="logout" _="on click call #logout-form.submit()">
                                    Logout
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </sl-menu-item>
                            </sl-menu>
                        </sl-dropdown>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                {{$slot}}
            </div>
        </main>
    </div>
</x-app-layout>
