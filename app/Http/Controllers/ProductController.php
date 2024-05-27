<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\CategoryProducts;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= product::all();
        // dd($data);
        return view('product.index',compact('data'))->with(['grt','Data Saved succesfully']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cdata=category::all(['id','name']);
        return view('product.create',compact('cdata'));

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
        $info=[
            'name'=>$request->name,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'qty'=>$request->qty,
            'mfg'=> $request->mfg
        ];
        $obj=product::create($info);
        if(count($request->category_id)>0){
            foreach($request->category_id as $cid){
                $cpinfo=[
                    'category_id'=>$cid,
                    'product_id'=>$obj->id
                ];
                CategoryProducts::create($cpinfo);
            }
        }
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
         return redirect('product.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
        return view('product.edit',['info'=>$product]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
        $product->name=$request->name;
        $product->description=$request->description;
        $product->save();
        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
        $product->find($product->{'id'})->delete();
        return redirect('/product')->with(['grt','Data Deleted succesfully']);
    }
    
}
