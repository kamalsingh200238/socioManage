<x-dashboard-layout>
    <div class="container mx-auto px-4 py-8">
        <div id="society-tables">
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Society Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Society Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($enrolledSocieties as $society)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{$society->name}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <sl-tag variant="{{ $society->Active ? 'success' : 'danger' }}" size="small" pill>
                                    {{$society->Active ? 'Active' : 'Not Active'}}
                                </sl-tag>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <sl-button
                                    type="button"
                                    variant="warning"
                                    size="small"
                                    hx-get="{{route('user.leave-society', ['society' => $society->id])}}"
                                    hx-target="#society-tables"
                                    hx-select="#society-tables"
                                >Leave
                                </sl-button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-dashboard-layout>
