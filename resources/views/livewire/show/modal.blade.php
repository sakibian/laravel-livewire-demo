<div x-data="{ open: @entangle('show') }" x-show="open" class="fixed inset-0 flex items-center justify-center z-50">
    <div class="absolute inset-0 bg-black opacity-50" @click="$wire.close()"></div>

    <div class="bg-white rounded p-6 z-60 max-w-2xl w-full">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">
                @if($type === 'company') Company details @else Client details @endif
            </h3>
            <button class="text-gray-600" @click="$wire.close()">✕</button>
        </div>

        <div>
            @if($type === 'company' && $data)
                <p><strong>Name:</strong> {{ $data->name }}</p>
                <p><strong>Reg #:</strong> {{ $data->reg_number }}</p>
                <p><strong>Phone:</strong> {{ $data->phone }}</p>
                <p><strong>Address:</strong> {{ $data->address }}</p>
                <p class="mt-3"><strong>Clients ({{ $data->clients->count() }}):</strong></p>
                <ul class="list-disc pl-6">
                    @foreach($data->clients as $c)
                        <li>{{ $c->name }} — {{ $c->email ?? '—' }}</li>
                    @endforeach
                </ul>
            @elseif($type === 'client' && $data)
                <p><strong>Name:</strong> {{ $data->name }}</p>
                <p><strong>Email:</strong> {{ $data->email }}</p>
                <p><strong>Phone:</strong> {{ $data->phone }}</p>
                <p><strong>Company:</strong> {{ optional($data->company)->name ?? '—' }}</p>
            @else
                <p>No data loaded.</p>
            @endif
        </div>
    </div>
</div>
