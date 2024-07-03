<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Beer;

class CartController extends Controller
{
    public function shop()
    {
        $products = Product::all();
        return view('shop')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products]);
    }

    public function cart()
    {
        $cartCollection = \Cart::getContent();
        $beers = Beer::all(); // Asegúrate de importar el modelo Beer
        return view('cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection, 'beers' => $beers]);
    }

    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }

    public function add(Request $request)
    {
        $product = Product::find($request->id);

        // Verificar si el producto tiene stock disponible
        if ($product->stock <= 0) {
            return redirect()->route('shop')->with('alert_msg', 'Producto fuera de stock');
        }

        \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->value,
            'quantity' => $request->quantity,
            'attributes' => [
                'image' => $product->image,
            ]
        ]);

        return redirect()->route('cart.index')->with('success_msg', 'Item Agregado a su Carrito!');
    }

    public function store(Request $request)
    {
        $product = Product::find($request->id);
        $quantity = $request->quantity;

        if (!in_array($quantity, [6, 12, 24])) {
            return redirect()->back()->with('alert_msg', 'Cantidad no permitida. Debe ser 6, 12, o 24.');
        }

        // Generar un ID único para cada pack
        $uniqueId = $product->id . '-' . uniqid();

        $cart = session()->get('cart', []);

        $cart[$uniqueId] = [
            "name" => $product->name,
            "quantity" => $quantity,
            "price" => $product->value,
            "image" => $product->image
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Producto agregado al carrito!');
    }

    public function update(Request $request)
    {
        // Validar que la cantidad sea un múltiplo de 6
        $quantity = $request->quantity;
        if ($quantity % 6 !== 0) {
            return redirect()->back()->with('alert_msg', 'La cantidad debe ser un múltiplo de 6 (6, 12, 18, 24, etc.).');
        }

        \Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));

        return redirect()->route('cart.index')->with('success_msg', 'El carrito se ha actualizado!');
    }

    public function clear()
    {
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'El carrito se ha limpiado!');
    }
}
