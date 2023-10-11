<?php

namespace App\Livewire\Clientes;

use Livewire\Component;

class Edit extends Component
{


    public function cancelar()
    {
        $this->dispatch('cerrar-vista_cliente');
    }
    public function render()
    {
        return view('livewire.clientes.edit');
    }
}
