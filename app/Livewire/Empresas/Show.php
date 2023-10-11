<?php

namespace App\Livewire\Empresas;

use App\Models\Empresa;
use Livewire\Component;

class Show extends Component
{

 public $empresas;
    public function render()
    {   $this->empresas=Empresa::all();

        return view('livewire.empresas.show');
    }
}
