<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\productRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product=Product::latest()->paginate(10);
        return view('public.product.index',['product'=>$product]);
    }

    public function create()
    {
        return view('public.product.create');
    }

    public function store(productRequest $request)
    {
        $image=$request->file('file')->hashName();
        $request->file('file')->move('products',$image);
        $request->merge(['image'=>$image]);

        Product::create($request->only('name','price','image','code'));
        return redirect()->back()->with(['msg'=>"بەسەرکەوتووی زیاد کرا"]);
    }

    public function edit($id)
    {
        $product=Product::findorfail($id);
        return view('public.product.edit',compact('product'));
    }

    public function update(productRequest $request,$id)
    {
        $product=Product::findorfail($id);
        
        if($request->file){
            $path='products/'.$product->image.'';
            if(file_exists($path)){
                unlink($path);
            }
            $image=$request->file('file')->hashName();
            $request->file('file')->move('products',$image);
            $request->merge(['image'=>$image]);

            $product->update($request->only('name','price','code','discount','image'));

        }else{
            $product->update($request->only('name','price','code','discount'));

        };
        return redirect()->back()->with(['msg'=>'بەسەرکەوتوی نوێ کرایەوە']);
    }
    
    // public function destroy($id)
    // {
    //     $pro=ModelsProduct::findorfail($id);

    //     $path='products/'.$pro->image.'';
    //     if(file_exists($path)){
    //         unlink($path);
    //     }
    //     $pro->delete();
    //     return redirect()->route('product.index');
    // }
}
