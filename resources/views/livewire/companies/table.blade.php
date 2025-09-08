<div class="p-4">
    <div class="flex justify-between mb-3">
        <input wire:model.debounce.300ms="search" placeholder="Search companies..." class="border px-3 py-2 rounded w-1/3">
        <select wire:model="perPage" class="border px-3 py-2 rounded">
            <option>5</option>
            <option>10</option>
            <option>25</option>
        </select>
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-3 py-2 text-left">#</th>
                <th class="px-3 py-2 text-left">Name</th>
                <th class="px-3 py-2 text-left">Reg No.</th>
                <th class="px-3 py-2 text-left">Phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
            <tr class="hover:bg-gray-50 cursor-pointer" wire:click="showDetails({{ $company->id }})">
                <td class="px-3 py-2">{{ $company->id }}</td>
                <td class="px-3 py-2">{{ $company->name }}</td>
                <td class="px-3 py-2">{{ $company->reg_number }}</td>
                <td class="px-3 py-2">{{ $company->phone }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $companies->links() }}
    </div>
</div>
