<?php

namespace App\Livewire\Show;

use Livewire\Component;
use App\Models\Company;
use App\Models\Client;

class Modal extends Component
{
    public $show = false;
    public $type = null; // 'company' or 'client'
    public $data = null;

    protected $listeners = ['open'];

    public function open($type, $id)
    {
        $this->type = $type;
        $this->show = true;
        if ($type === 'company') {
            $this->data = Company::with('clients')->find($id);
        } else {
            $this->data = Client::with('company')->find($id);
        }
    }

    public function close()
    {
        $this->reset(['show','type','data']);
    }

    public function render()
    {
        return view('livewire.show.modal');
    }
}
