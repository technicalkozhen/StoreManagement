<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\productRequest;
use App\Models\Product;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        UserActivity::create([  'name'=>auth()->user()->name,
                                'email'=>auth()->user()->email,
                                'type_activity' => 'زیادکردنی کاڵا'
        ]);
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

        UserActivity::create([  'name'=>auth()->user()->name,
                                'email'=>auth()->user()->email,
                                'type_activity' => 'نوێکردنەوەی کاڵا'
        ]);

        return redirect()->back()->with(['msg'=>'بەسەرکەوتوی نوێ کرایەوە']);
    }
    
    public function destroy($id)
    {
        $pro=Product::findorfail($id);

        $path='products/'.$pro->image.'';
        if(file_exists($path)){
            unlink($path);
        }
        $pro->delete();

        UserActivity::create([  'name'=>auth()->user()->name,
                                'email'=>auth()->user()->email,
                                'type_activity' => 'سڕینەوەی کاڵا'
        ]);
        return redirect()->route('product.index');
    }
}
