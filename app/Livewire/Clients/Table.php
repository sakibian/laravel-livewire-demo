<?php

namespace App\Livewire\Clients;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Client;

class Table extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public $search = '';
    public $perPage = 10;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function showDetails($clientId)
    {
        $this->emitTo('show.modal', 'open', 'client', $clientId);
    }

    public function render()
    {
        $query = Client::with('company')
            ->when($this->search, fn($q) =>
                $q->where('name', 'like', "%{$this->search}%")
                  ->orWhere('email', 'like', "%{$this->search}%")
            );

        return view('livewire.clients.table', [
            'clients' => $query->latest()->paginate($this->perPage),
        ]);
    }
}
