<?php

namespace App\Livewire\Ajustes;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public $stripe_key, $stripe_secret, $empresa;

    public function mount()
    {
        $this->empresa = Auth::user()->empresa;
        $this->stripe_key = $this->empresa->stripe_key;
        $this->stripe_secret = $this->empresa->stripe_secret;
    }
    public function guardar()
    {
        $this->empresa->update([
            'stripe_ke' => $this->stripe_key,
            'stripe_secret' => $this->stripe_secret
        ]);
        $this->dispatch('stripe-guardado', 'Configuracion realizada correctamente');
    }

    public function render()
    {
        return view('livewire.ajustes.show');
    }
}
