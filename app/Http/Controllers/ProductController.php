<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\CategoryProducts;
use App\Models\product_media;
use App\Helpers\ThumbnailGenerator;
use Illuminate\Support\Facades\Storage;

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
        return redirect('/product');

    }

    /**
     * Store a newly created resource in storage.4
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => "required|min:2|max:40",
            'price' => 'required',
        ]);
        
        $info=[
            'name'=>$request->name,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'description'=>$request->description,
            'mfg'=> $request->mfg,
            // 'photo' => $request->photo       
        ];
        $obj=product::create($info);
        if(count($request->category_id)>0
        
        ){
            foreach($request->category_id as $cid){
                $cpinfo=[
                    'category_id'=>$cid,
                    'product_id'=>$obj->id
                ];
                CategoryProducts::create($cpinfo);
            }
        }
        foreach($request->photo as $img)
        {
            $filename=[];
            // $file = $request->file('phots');
            $imgname =$img->getClientOriginalName(); 
            // $file->storeAs('public/photos', $filename); 
            // $thumbnail = ThumbnailGenerator::generate($file, 300, 200);
            // Storage::put('public/thumbnails/' . $filename, $thumbnail);
            // Image::make($request->photo)->save(public_path('photo'.$filename));
            // Image::make($request->photo)->resize(150, 150)->save(public_path('thumbnail'.$filename));
            $img->move(public_path('photos'), $imgname);
            $filename[]=$imgname;
            $isave=[
                'type'=>substr($imgname,strpos($imgname,".")+1),
                'image'=>$img,
                'p_id'=>$obj->id,
                'file_path'=>$imgname
            ];
            product_media::create($isave);
        }
        // print_r($request);
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
        $category=(array_column($product->allcategory->toArray(),'category_id'));
        return view('product.edit',['info'=>$product,'cdata'=>category::all(['id','name']),'category'=>$category]);

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
            $product->price=$request->price;
            $product->discount=$request->discount;
            $product->description=$request->description;
            $product->mfg=$request->mfg;
            // $product->photo=$request -> photo;
            
            
            $product->save();
            return redirect('/product');
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
    public function imageDelete($id){
       $img= product_media::find($id);
        unlink("photos/".$img['file_path']);
        $img->delete();
    }
    
}
