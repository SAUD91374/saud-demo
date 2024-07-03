<?php

namespace App\Http\Controllers;
use App\Models\product;

use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        //
        $cart = cart::where('user_id',Auth::id())->get();
        // $pdata=$cart[]->product;
        // dd($cart);
        // $pf=product::all()->where('product_id');
        return view('cart.index',compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return redirect('/cart');

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $cartd=[
            'user_id'=>$request->user_id,
            'product_id'=>$request->product_id,
            'qty'=>$request->qty,
        ];
        cart::create($cartd);
        return redirect('/cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(cart $cart)
    {
        //
        // $cart = cart::all()->where('user_id',Auth::id());

        $pd = Product::where('user_id',Auth::id());
        return view('cart.index', compact('pd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(cart $cart,$id)
    {
        $cartItem = Cart::where('product_id', $id)->first();

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back();
        }

        // dd($cart);
        // $cart->find($cart->{'product_id'})->delete();
        return redirect('/cart');
    }
    
}
