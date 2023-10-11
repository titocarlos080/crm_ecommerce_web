<?php

namespace App\Livewire\Empleados;

use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        return view('livewire.empleados.edit');
    }
    public function cancelar()
    {
        $this->dispatch('cerrar-vista_crear');
    }
}
