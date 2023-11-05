<?php

namespace App\Livewire\Producto;

use App\Models\Producto;
use Faker\Extension\FileExtension;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Show extends Component
{
    use WithFileUploads;
    public $productos;
    public $producto_seleccionado;
    public $sucursales;
    public $categorias;
    public $sucursal_trabajo;
    public $show_crear = false;
    public $show = false;
    public $show_editar = false;
    // protected $fillable = ['id', 'nombre', 'imagen', 'descripcion', 'stock', 'costo', 'precio', 'id_categoria', 'id_sucursal', 'id_empresa'];

    public $nombre, $imagen, $descripcion, $stock, $costo, $precio, $id_categoria, $id_sucursal, $id_empresa;
    public $nombre_edit, $imagen_edit, $descripcion_edit, $stock_edit, $costo_edit, $precio_edit, $id_categoria_edit, $id_sucursal_edit;


    public function cambiar_sucursal($id)
    {
        $this->sucursal_trabajo = $id;
        $this->id_sucursal_edit = $id;
    }
    public function cambiar_categoria($id)
    {
        $this->id_categoria = $id;
        $this->id_categoria_edit = $id;
    }
    public function opcion_show($id)
    {
        $this->show = true;
        $producto = Producto::where('id', $id)->first();

        $this->nombre = $producto->nombre;
        $this->imagen = $producto->imagen;
        $this->descripcion  = $producto->descripcion;
        $this->stock  = $producto->stock;
        $this->costo  = $producto->costo;
        $this->precio  = $producto->precio;
        $this->id_categoria  = $producto->id_categoria;
        $this->id_sucursal = $producto->id_sucursal;
    }
    public function vista_crear()
    {
        $this->show_crear = true;
    }
    public function  crear_producto()
    {
        DB::beginTransaction();

        try {
            //code...
            $id_empresa = Auth::user()->empresa->id;
            $this->validate([
                'nombre' => 'required',
                'imagen' => 'required',
                'descripcion' => 'required',
                'stock' => 'required|min:0',
                'costo' => 'required|min:0',
                'precio' => 'required|min:0',
                'id_categoria' => 'required'
            ]);

            $producto = new Producto();
            $producto->nombre = $this->nombre;
            $producto->imagen = '';
            $producto->descripcion = $this->descripcion;
            $producto->stock = $this->stock;
            $producto->costo = $this->costo;
            $producto->precio = $this->precio;
            $producto->id_categoria = $this->id_categoria;
            $producto->id_sucursal = $this->sucursal_trabajo;
            $producto->id_empresa = $id_empresa;

            $producto->save();
            if (!empty($this->imagen)) {
                $extensionImagen =  $this->imagen->extension();
                $nombreImagen = 'PRODUCTO' . str_pad($producto->id, STR_PAD_RIGHT) . '.' . $extensionImagen;
                $rutaImagen = $this->imagen->storeAs('public/imagenes/productos', $nombreImagen);
                $producto->update(['imagen' => Storage::url($rutaImagen)]);
            }

            DB::commit();
            $this->dispatch('producto-creado', 'producto creado satisfactoriamente');
            $this->reset('nombre', 'imagen', 'descripcion', 'stock', 'costo', 'precio', 'id_categoria');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            $this->dispatch('producto-error', 'producto No se pudo crear. intente nuevamente');
        }
    }



    public function vista_editar($id)
    {
        $this->producto_seleccionado = $id;
        $producto = Producto::where('id', $id)->first();
        $this->show_editar = true;
        $this->nombre_edit = $producto->nombre;

        $this->imagen = $producto->imagen;
        $this->descripcion_edit = $producto->descripcion;
        $this->stock_edit = $producto->stock;
        $this->costo_edit = $producto->costo;
        $this->precio_edit = $producto->precio;
        $this->id_categoria_edit = $producto->id_categoria;
        $this->id_sucursal_edit = $producto->id_sucursal;
    }
    public function editar_producto()
    {  // funcion para actualizar
        try {
            DB::beginTransaction();
            //code...

            $producto = Producto::where('id', $this->producto_seleccionado)->first();
            $producto->update(
                [
                    'nombre' => $this->nombre_edit,
                    'descripcion' => $this->descripcion_edit,
                    'stock' => $this->stock_edit,
                    'costo' => $this->costo_edit,
                    'precio' => $this->precio_edit
                ]
            );

            if (!empty($this->imagen_edit)) {
                Storage::delete(str_replace('/storage', 'public', $producto->imagen));
                $extensionImagen =  $this->imagen_edit->extension();
                $nombreImagen = 'PRODUCTO' . str_pad($producto->id, STR_PAD_RIGHT) . '.' . $extensionImagen;

                $rutaImagen = $this->imagen_edit->storeAs('public/imagenes/productos', $nombreImagen);
                $producto->update(['imagen' => Storage::url($rutaImagen)]);
            }

            DB::commit();
            $this->dispatch('producto-editado', 'Producto actualizado satisfactoriamente');
            $this->reset('nombre_edit', 'imagen_edit', 'descripcion_edit', 'stock_edit',
             'costo_edit', 'precio_edit', 'id_categoria_edit', 'id_sucursal_edit','show_editar');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            $this->dispatch('producto-error-editado', 'Producto no se pudo actualizar');
        }
    }

    public function eliminar_producto($id)
    {
        $unproducto = Producto::find($id);
        if ($unproducto) {
            // Eliminar la imagen asociada al producto
            Storage::delete(str_replace('/storage', 'public', $unproducto->imagen));
            // Eliminar el producto
            $unproducto->delete();
            $this->dispatch('producto-eliminado', 'Producto Eliminado');
        }
    }
    public function render()
    {
        $id_empresa = Auth::user()->empresa->id;
        $this->productos = DB::select('select * from producto where id_empresa = ?', [$id_empresa]);
        $this->categorias = DB::select('select * from categoria where id_empresa = ? and id_sucursal=?', [$id_empresa, $this->sucursal_trabajo]);
        $this->sucursales = DB::select('select * from sucursal where id_empresa = ?', [$id_empresa]);
        return view('livewire.producto.show');
    }
}
