<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware(CheckRole::class . ':2'); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders;
        return view('store.orders',compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cart = collect(json_decode($request->cartData, true));
        $redirectToCart = false;
        $products=collect();

        foreach ($cart as $item) {
            $product = Product::where('id',$item['code'])->first();
            if($product['stock_qty'] - $item['qty'] < 0){
                $redirectToCart = true;
            } else {
                $product['stock_qty'] = $item['qty'];
            }
            $products->add($product);
        }

        $filtered = $products->map(function ($product) {
            return $product->only(['id', 'name', 'price', 'stock_qty']);
        });

        if($redirectToCart==false){
            $total=0;

            foreach($products as $product){
                $subtotal=$product['price']*$product['stock_qty'];
                $total=$total+$subtotal;
            }
            if($total < 50){
                $total = $total + 9.99;
            }

            $order = new Order([
                "name" => $request->name,
                "user_id" =>  Auth::user()['id'],
                "surname" => $request->surname,
                "address" => $request->address,
                "city" => $request->city,
                "zip" => $request->zip,
                "status_id" => 1,
                "total" => $total,
            ]);
            $order->save();

            foreach($products as $product){
                $order->products()->attach($product->id, ['qty' => $product['stock_qty']]);
                $buyedProduct = Product::where('id',$product['id'])->first();
                $buyedProduct->stock_qty = $buyedProduct['stock_qty']-$product['stock_qty'];
                $buyedProduct->save();
            }
            return view('store.orderComplete');

        }
        else {
            return redirect()->route('store.cart')->with( ['cart' => $filtered] )->withErrors(['no_qty' => 'Alcuni prodotti non sono disponibili nelle quantità richieste. Ecco il carrello aggiornato']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('store.order',compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        dd($order);
        return view('store.order',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order->name = $request['name'];
        $order->surname = $request['surname'];
        $order->state = $request['state'];
        $order->price = $request['price'];
        $order->city = $request['city'];
        $order->zip = $request['zip'];
        $order->tracking = $request['tracking'];
        $order->status_id = $request['status_id'];
        $order->total = $request['total'];
        $order->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
