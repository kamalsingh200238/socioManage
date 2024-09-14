<x-dashboard-layout>
    <div class="flex justify-between items-center">
        <div class="flex gap-5 items-center">
            <sl-input
                name="search"
                placeholder="Search..."
                value="{{$search}}"
                class="w-64"
                hx-get="{{ route('coordinator.dashboard') }}"
                hx-trigger="input changed delay:250ms, search"
                hx-target="#societies-table"
                hx-select="#societies-table"
                hx-replace-url="true"
                hx-indicator="#societies-spinner"
            ></sl-input>
            <div id="societies-spinner"
                 class="border-gray-300 h-6 w-6 animate-spin rounded-full border-4 border-t-sky-800 [.htmx-request&]:block hidden"
            ></div>
        </div>
        <sl-button
            href="{{route('coordinator.create-society-form')}}"
            variant="primary"
            size="small"
        >
            Create society
        </sl-button>
    </div>
    <div id="societies-table" class="mt-8">
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 table-auto">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        President
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Toggle status
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Edit
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($societies as $society)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{$society->name}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <sl-tag variant="{{ $society->active ? 'success' : 'danger' }}" size="small" pill>
                                {{$society->active ? 'Active' : 'Not Active'}}
                            </sl-tag>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$society->president?->name ?? 'No president'}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <sl-button
                                variant="{{$society->active ? 'danger' : 'success'}}"
                                size="small"
                                hx-get="{{route('coordinator.toggle-society-status', ['society' => $society->id])}}"
                                hx-target="#societies-table"
                                hx-select="#societies-table"
                            >
                                {{$society->active ? 'Disable': 'Enable'}}
                            </sl-button>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <sl-icon-button
                                name="pencil-square"
                                class="text-base"
                                label="Edit"
                                href="{{ route('coordinator.edit-society-form', ['society'=>$society->id]) }}"
                            >
                            </sl-icon-button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-8" hx-boost="true" hx-replace-url="true">
            {{ $societies->links() }}
        </div>
    </div>

    @if (session('success'))
        <sl-alert variant="success" duration="5000" closable _="init my.toast()">
            <sl-icon slot="icon" name="check2-circle"></sl-icon>
            <strong>{{session('success')}}</strong>
        </sl-alert>
    @endif
</x-dashboard-layout>
