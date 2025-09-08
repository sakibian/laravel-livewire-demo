<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Company;
use App\Models\Client;

class Stats extends Component
{
    public function render()
    {
        return view('livewire.dashboard.stats', [
            'companiesCount' => Company::count(),
            'clientsCount' => Client::count(),
        ]);
    }
}
