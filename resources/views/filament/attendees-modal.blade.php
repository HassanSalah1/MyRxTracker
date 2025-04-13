<div class="space-y-4">
    <div class="flex justify-end">
        <a
                href="{{ route('filament.export-attendees', $eventId) }}"
                class="inline-flex items-center px-4 py-2 bg-primary-600 text-white text-sm font-medium rounded hover:bg-primary-700"
        >
            Export CSV
        </a>
    </div>
    @if($attendees->isEmpty())
        <p class="text-sm text-gray-500">No attendees yet.</p>
    @else
        <table class="w-full text-sm text-left border">
            <thead class="bg-gray-50 text-xs text-gray-500 uppercase">
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">mobile</th>
            </tr>
            </thead>
            <tbody>
            @foreach($attendees as $user)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->mobile }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
