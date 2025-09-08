<?php

namespace App\Livewire\Companies;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Company;

class Table extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public $search = '';
    public $perPage = 10;

    protected $listeners = ['refreshCompanies' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function showDetails($companyId)
    {
        $company = Company::with('clients')->findOrFail($companyId);
        $this->emitTo('show.modal', 'open', 'company', $companyId);
    }

    public function render()
    {
        $query = Company::query()
            ->when($this->search, fn($q) => $q->where('name', 'like', "%{$this->search}%")
                ->orWhere('reg_number', 'like', "%{$this->search}%"));

        return view('livewire.companies.table', [
            'companies' => $query->latest()->paginate($this->perPage),
        ]);
    }
}
