<?php

namespace App\Http\Controllers;

use App\Mail\NotiEmailPedido;
use App\Models\Pedido;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Livewire\Livewire;

use function PHPSTORM_META\map;

class StripeController extends Controller
{

    //private $id_session;
    public function session(Request $request)
    {
        session(['transaccion' => false]);
        $empresa = Session::get('empresa'); // acomodar para cada empresa
        //$user         = auth()->user();
        $carri  =    $request->carrito;
        $carrito  =  json_decode($carri, true);
        session(['carrito' =>  $carrito]);
        $productItems = [];                                  //stripe_key','stripe_secret
        \Stripe\Stripe::setApiKey(config('stripe.sk')); //$empresa->stripe_secret
        foreach ($carrito as $id => $details) {
            $prod = json_decode($details, true);
            $product_name = $prod['nombre'];
            $total = $prod['precio'];
            $quantity = $prod['cantidad'];
            $totalInCents = (int) str_replace('.', '', $total);
            $unit_amount = $totalInCents;
            $productItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => $product_name,
                    ],
                    'currency'     => 'bob',
                    'unit_amount'  => $unit_amount,
                ],
                'quantity' => $quantity,
            ];
        }
        $checkoutSession = \Stripe\Checkout\Session::create([
            'line_items'            => $productItems,
            'mode'                  => 'payment',
            'payment_method_types'  => ['card'],
            'allow_promotion_codes' => true,
            'metadata'              => [
                'user_id' => "0001"
            ],
            'customer_email' => "titocarlos080@gmail.com", //$user->email,
            'success_url' => route('success'),
            'cancel_url'  => url()->previous(), //que vaya de donde vino
        ]);
        $checkoutSession->updateAttributes([

            'success_url' => route('success', ['transaccion', $checkoutSession->id]),

        ]);
        return redirect()->away($checkoutSession->url);
    }

    public function success(Request $request)
    {
        session(['transaccion' => true]);

        // Obtener todos los datos de la solicitud
        $requestData = $request->all();
        $micarrito = Session::get('carrito');
        $suma = 0;

        $pedido = new Pedido();
        $pedido->fecha = now();
        $pedido->id_usuario = Auth::user()->id;
        $pedido->id_empresa = Auth::user()->empresa->id;
        $pedido->id_estado_pedido = 1;
        $pedido->save();
        $detallePedido = [];

        foreach ($micarrito as $id => $details) {
            $producto = json_decode($details, true);
            $detallePedido[$id] = [
                'id_pedido' => $pedido->id,
                'id_producto' => $producto['id'],
                'cantidad' => $producto['cantidad'],
                'precio_parcial' => $producto['subtotal'],
            ];
            $suma += $producto['subtotal'];
        }
        $pedido->productos()->attach($detallePedido);
        $user=DB::select(' select usuario.email ,usuario.nombre
        from usuario,pedido
        where usuario.id= pedido.id_usuario and pedido.id=?', [$pedido->id]);
         $data = [
            'nombre' => $user[0]->nombre,
            'estado' => 'Solicitando',
            'pedido' => $pedido->id,
         ];
       
        Mail::to($user[0]->email)->send(new NotiEmailPedido($data));

        return view('livewire.ecommerce.detalle-pedido', [
            'pedido' => $micarrito,
            'empresa' => Session::get('empresa'),
            'total' => $suma,
            'id_pedido' => $pedido->id,

        ]);
    }

    public function cancel()
    {
        return redirect()->route('pedido', ['empresa' => session('empresa')]);
    }
    public function boleta($boleta)
    { 
             // Obtén la colección de pedidos según el $boleta recibido
             $pedido = Pedido::where('id', $boleta)->get();
             $empresa= Auth::user()->empresa->id;
             $pedidos = DB::select('select pd.id, prd.nombre,prd.descripcion, dp.cantidad,prd.precio, (dp.cantidad*prd.precio) subtotal
             from  pedido pd, detalle_pedido dp, producto prd
             where  pd.id= dp.id_pedido and dp.id_producto= prd.id  and pd.id_empresa= ? and pd.id=?', [$empresa,$boleta]);
               
            $totales = DB::select(' 
            select  sum(cast(dp.precio_parcial as double precision))  total
            from detalle_pedido dp, pedido p
            where dp.id_pedido =  ? 
            limit 1',[$boleta]);
            $totalApagar= $totales[0]->total;
              $pdf = Pdf::loadView('pdf.reportes-pedido',['pedidos'=>$pedidos,'monto_total'=>$totalApagar]);

      
             // Cambia 'doc.pdf' al nombre que desees para el archivo PDF descargado.
             return $pdf->stream('doc.pdf');
    }

    public function generatePdf()
    {             
        $pedidos = session('pedidos_filtro');
 
        $pdf = Pdf::loadView('pdf.reportes', [
            'pedidos' => $pedidos,
           
        ]);
        

        return   $pdf->stream('doc.pdf');
    } 
}
