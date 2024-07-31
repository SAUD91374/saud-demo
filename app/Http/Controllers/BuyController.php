<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\product;
use Illuminate\Http\Request;

class BuyController extends Controller
{
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function buy(Request $request)
//     {
//         dd($request);
//         $product = Product::find($request->product_id);
//         $order = Buy::create([
//             'user_id' => auth()->id(),
//             'product_id' => $product->id,
//             'quantity' => $product->quantity, 
//             'total_price' => $product->price,
//             'status' => $request->status
//         ]);

//         return redirect()->route('or', ['order' => $order->id]);
//     }
//     public function orderConfirmation($orderId)
// {
//     $order = buy::findOrFail($orderId);

//     return view('orderconfirm', compact('order'));
// }

    public function index()
    {
        //
        $product=buy::all();
        return view('buy.buy-now',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
      $info =  ['user_id'=>$request->user_id,
        'product_id'=>$request->product_id,
        'quantity'=>$request->quantity,
        'total_price'=>$request->total_price,
        // 'status'=> $request->status
    ];
    $obj=buy::create($info);
    return redirect('/buy');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buy  $buy
     * @return \Illuminate\Http\Response
     */
    public function show(Buy $buy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buy  $buy
     * @return \Illuminate\Http\Response
     */
    public function edit(Buy $buy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buy  $buy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buy $buy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buy  $buy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buy $buy)
    {
        //
    }
    public function placeOrder(Request $request, $id)
{
    // Your code to handle the request goes here
    // dd($request);
    $info =  ['user_id'=>$request->user_id,
    'product_id'=>$request->product_id,
    'quantity'=>$request->quantity,
    'total_price'=>$request->total_price,
    // 'status'=> $request->status
];
$obj=buy::create($info);
return redirect('buy.orderconfirm');
}
public function orderconfirm(){
 $buy=buy::all();
 foreach($buy as $buys){
    
//  dd($buys->product_id);
 $product = product::where('id',$buys->product_id)->get();
//  dd($product);
return view('buy.orderconfirm',compact('buy','product'));   
 }
}
}
