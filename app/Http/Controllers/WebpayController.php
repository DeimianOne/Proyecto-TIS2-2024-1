<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Transbank\Webpay\WebpayPlus\Transaction;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Sale;

class WebpayController extends Controller
{
    // tarjeta debito 4051885600446623
    // Rut: 11.111.111-1
    // Clave de webpay: 123

    public function create(Request $request)
    {
        // Obtiene los productos del carrito desde la sesión
        $cartItems = Cart::getContent();
        $saleTotal = Cart::getTotal();

        // Crea una nueva venta
        $sale = new Sale();
        if (auth()->check()) {
            $sale->user_id = auth()->id();
        }
        $sale->sale_type = 'online_sale';
        $sale->delivery_type = $request->input('delivery_type');
        $sale->sale_date = now();
        $sale->paymentmethod_id = $request->input('payment_method');
        $sale->sale_status = 'pending';
        $sale->sale_total = $saleTotal;
        $sale->save();

        // Configura la transacción de WebPay
        $transaction = new Transaction();
        $response = $transaction->create(
            $sale->id, // El ID de la venta como buyOrder
            session()->getId(), // sessionId
            $saleTotal, // El total de la venta
            route('webpay.confirm') // URL de retorno
        );

        // Redirige al usuario a WebPay
        // return redirect($response->getUrl() . '?token_ws=' . $response->getToken());
        return redirect()->away($response->getUrl() . '?token_ws=' . $response->getToken());
    }

    public function confirm(Request $request)
    {
        $token = $request->input('token_ws');
        $transaction = new Transaction();
        $response = $transaction->commit($token);

        if ($response->isApproved()) {
            // Actualiza el estado de la venta a 'completed'
            $sale = Sale::findOrFail($response->getBuyOrder());
            $sale->sale_status = 'completed';
            $sale->save();

            // Limpia el carrito
            Cart::clear();

            return redirect()->route('success');
        } else {
            // Maneja el error según sea necesario
            return redirect()->route('failure');
        }
    }
}
