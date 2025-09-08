<x-layouts.app :title="__('Dashboard')">
    <div class="container mx-auto p-6">
        <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
                @livewire('dashboard.stats')
            </div>

            <div class="col-span-3 bg-white rounded shadow p-4">
                <h3 class="font-semibold mb-3">Companies</h3>
                @livewire('companies.table')
            </div>

            <div class="col-span-3 bg-white rounded shadow p-4">
                <h3 class="font-semibold mb-3">Clients</h3>
                @livewire('clients.table')
            </div>
        </div>

        @livewire('show.modal')
    </div>
</x-layouts.app>
