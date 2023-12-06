<?php

namespace App\Livewire\Pedido;

use App\Mail\NotiEmailPedido;
use App\Models\Pedido;
use App\Models\Pedido_Estado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Show extends Component
{
    public $pedidos;
    public $estado_seleccionado;
    public $swap = 0;
    public $id_estado;


    public function filtar_pedido()
    {
        $this->swap = $this->id_estado;
    }

    public function cambiar_estado($id)
    {
        $pedido  = Pedido::where('id', $id)->first();
        $pedido->update(['id_estado_pedido'=>$this->estado_seleccionado]);
        $this->dispatch('pedido-cambio_estado', 'Pedido Cambio de estado a '.$this->getEstado($this->estado_seleccionado));
        $user=DB::select(' select usuario.email ,usuario.nombre
        from usuario,pedido
        where usuario.id= pedido.id_usuario and pedido.id=?', [$pedido->id]);
         $data = [
            'nombre' => $user[0]->nombre,
            'estado' => $this->getEstado($this->estado_seleccionado),
            'pedido' => $pedido->id,
         ];
       
        Mail::to($user[0]->email)->send(new NotiEmailPedido($data));

    }
    private function  getEstado($id)
    {
        $estado = Pedido_Estado::where('id', $id)->first();
        return $estado->nombre;
    }
    public function eliminar_pedido($id)
    {
        $pedido  = Pedido::where('id', $id)->first();
        $pedido->delete();
        $this->dispatch('pedido-eliminado', 'Pedido Eliminado');
    }
    public function estados()
    {
        return Pedido_Estado::all();
    }
    public function render()
    {
        $id_empresa = Auth::user()->empresa->id;    
        $this->pedidos = Pedido::where('id_empresa', $id_empresa)->get();
        if ($this->swap != 0) {
            $this->pedidos = Pedido::where('id_empresa', $id_empresa)
                ->where('id_estado_pedido', $this->id_estado)
                ->get();
        }
        return view('livewire.pedido.show');
    }
}
