<?php

namespace App\Livewire\Leads;

use Livewire\Component;

class Show extends Component
{
    public $vistacrear=false;
    public $vistaedit=false;
    public function render()
    {
        return view('livewire.leads.show');
    }
    public function vistacrea()
    {
        $this->vistacrear = true;
    }
    public function vistaedi()
    {
        $this->vistaedit = true;
    }
}
