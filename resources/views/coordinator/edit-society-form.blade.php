<x-app-layout>
    <div
        class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-cyan-900 to-slate-900 relative p-4"
    >
        <sl-button
            variant="text"
            href="{{route('coordinator.dashboard')}}"
            class="absolute top-4 left-4 [--sl-color-primary-600:white]"
        >
            Back
        </sl-button>

        <div class="bg-white p-6 sm:p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-6 text-center">Edit Society</h2>
            <form
                id="edit-form"
                hx-post="{{ route('coordinator.edit-society', ['society' => $society->id]) }}"
                hx-target="this"
                hx-select="#edit-form"
            >
                @csrf
                @method('PATCH')
                <div class="space-y-4">
                    <div>
                        <sl-input
                            name="society_name" label="Society name"
                            value="{{ old('society_name') ?? $society->name }}"
                            autofocus
                        ></sl-input>
                        <x-form-error for="society_name" class="mt-1 text-red-500 text-sm"/>
                    </div>
                    <div>
                        <sl-input
                            name="president_email"
                            label="President email"
                            value="{{ old('president_email') ?? $society->president?->email ?? '' }}"
                        ></sl-input>
                        <x-form-error for="president_email" class="mt-1"/>
                    </div>
                    <div>
                        <sl-checkbox
                            name="status"
                            checked="{{$society->active}}"
                        >
                            Society status
                        </sl-checkbox>
                        <x-form-error for="status" class="mt-1"/>
                    </div>
                </div>
                <sl-button type="submit" variant="primary" class="w-full mt-6">Submit</sl-button>
            </form>
        </div>
    </div>
</x-app-layout>
