<?php

namespace App\Livewire\Planes;

use App\Models\Plan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Show extends Component
{
    use WithFileUploads;
    public  $planes;
    public  $mensaje;
    //--------------
    public  $nombre, $logo, $precio, $ancho_banda, $almacenamiento, $dominio,
        $soporte_email, $soporte, $numero_usuario;

    //------------
    public  $nombreSelect, $logoSelect, $precioSelect, $ancho_bandaSelect, $almacenamientoSelect,
        $dominioSelect, $soporte_emailSelect, $soporteSelect, $numero_usuarioSelect;

    public  $mensaje_estado, $plan_seleccionado, $crear_plan = false, $editar_plan = false;

    public function crear_nuevo()
    {
        $this->crear_plan = true;
    }
    public function crear()
    {
        try {
            DB::beginTransaction();
            //code...
            $plan = new Plan();
            $plan->nombre = $this->nombre;
            $plan->logo = '';
            $plan->precio = $this->precio;
            $plan->almacenamiento = $this->almacenamiento ?: 0;
            $plan->ancho_de_banda = $this->ancho_banda ?: false;
            $plan->dominio = $this->dominio ?: false;
            $plan->soporte_por_correo = $this->soporte_email ?: false;
            $plan->soporte_24x7 = $this->soporte ?: false;
            $plan->usuarios = $this->numero_usuario;
            $plan->save();

            if (!empty($this->logo)) {
                $extensionImagen = $this->logo->getClientOriginalExtension() || '';
                $nombreImagen = 'PLAN' . str_pad($plan->id, STR_PAD_RIGHT) . '.' . $extensionImagen;
                $rutaImagen = $this->logo->storeAs('public/imagenes/planes', $nombreImagen);
                $plan->update(['logo' => Storage::url($rutaImagen)]);
            }
            DB::commit();
            $this->mensaje = "Plan creado Correctamente.";
            $this->mensaje_estado = false;

            //---

            $this->nombre = '';
            $this->precio = '';
            $this->logo = null;
            $this->numero_usuario = 0;
            //--
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            $this->mensaje = "Ops. ocourrio un error, intente nuevamente.";
            $this->mensaje_estado = true;
        }
    }


    public function editar_plans($id)
    {

        $this->plan_seleccionado = $id;
        $plan = Plan::find($this->plan_seleccionado);
        $this->nombreSelect = $plan->nombre;
        $this->logoSelect = $plan->logo;
        $this->precioSelect = $plan->precio;
        $this->almacenamientoSelect = $plan->almacenamiento;
        $this->ancho_bandaSelect = $plan->ancho_de_banda;
        $this->dominioSelect = $plan->dominio;
        $this->soporte_emailSelect = $plan->soporte_por_correo;
        $this->soporteSelect = $plan->soporte_24x7;
        $this->numero_usuarioSelect = $plan->usuarios;
        $this->editar_plan = true;
    }





    public function eliminar_plans($id)
    { $plan = Plan::find($id);
        if ($plan->foto) {
            Storage::delete($plan->foto);
        }
        Plan::destroy($id);
        $this->render();
        
    }
    public function miembros($id)
    {
        $mienbros = DB::select('select cant(*) from empresa where id_plan = ?', [$id]);
        return $mienbros;
    }
    public function actualizar()
    {
        try {
            //code...
            $plan = Plan::find($this->plan_seleccionado);
            $plan->update([
                'nombre' => $this->nombreSelect,
                'precio' => $this->precioSelect,
                'almacenamiento' => $this->almacenamientoSelect,
                'ancho_de_banda' => $this->ancho_bandaSelect,
                'dominio' => $this->dominioSelect,
                'soporte_por_correo' => $this->soporte_emailSelect,
                'soporte_24x7' => $this->soporteSelect,
                'usuarios' => $this->numero_usuarioSelect
            ]);
            if (!empty($this->logo)) {
                Storage::delete($plan->logo);
                $extensionImagen = $this->logo->getClientOriginalExtension() || '';
                $nombreImagen = 'PLAN' . str_pad($plan->id, STR_PAD_RIGHT) . '.' . $extensionImagen;
                $rutaImagen = $this->logo->storeAs('public/imagenes/planes', $nombreImagen);
                $plan->update(['logo' => Storage::url($rutaImagen)]);
            }
            $this->mensaje = "Plan actualizado correctamente.";
            $this->mensaje_estado = false;
        } catch (\Throwable $th) {
            //throw $th;
            $this->mensaje = "Ocurrio problemas al actualizar.";
            $this->mensaje_estado = false;
        }
    }
    public function render()
    {
        $this->planes = Plan::all();
        return view('livewire.planes.show');
    }
}
