<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\ProductInvoice;
use App\Models\TableProduct;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PublicController extends Controller
{
    public function index(){
        $product=Product::all();
        $t_pro=TableProduct::all();
        $total_price=0;
        foreach($t_pro as $data){
            $total_price=$total_price+$data->totalprice;
        }
        return view('public.index',compact('product','t_pro','total_price'));
    }
    public function addProductToTable($id){
        $product=product::findorfail($id);

        TableProduct::create(['name'=>$product->name,
                                    'price'=>$product->price,
                                    'quantity'=>$product->quantity,
                                    'totalprice'=>($product->price)*($product->quantity),
                                    'product_id'=>$product->id,
                                    'code'=>$product->code,
                                        ]);
        return redirect()->back();
    }
    public function deleteProductToTable($id){
        TableProduct::findorfail($id)->delete();
        return redirect()->back();
    }
    public function increaceNumberQuantity($id){
        $t_pro=TableProduct::findorfail($id);
        $t_pro->update(['quantity'=>($t_pro->quantity+1)]);
        $t_pro->update(['totalprice'=>($t_pro->quantity * $t_pro->price)]);
        return redirect()->back();
    }
    public function decreaceNumberQuantity($id){
      
        $t_pro=TableProduct::findorfail($id);
        if ($t_pro->quantity<=1) {
            TableProduct::findorfail($id)->delete();
            return redirect()->back();
        }
        $t_pro->update(['quantity'=>($t_pro->quantity-1)]);
        $t_pro->update(['totalprice'=>($t_pro->quantity * $t_pro->price)]);
        return redirect()->back();
    }
    public function buyproduct($state){
        
        $invoice=Invoice::create(['user_id'=>Auth::id(),
                                'state'=>$state
        ]);


        $t_p=TableProduct::all();                  
            foreach($t_p as $table_pro){
                $product=Product::findorfail($table_pro->product_id);

                $oldPath='products/'.$product->image.'';
                $newPath='productInvoice/'.$product->image.'';
                File::copy($oldPath , $newPath);
                
                ProductInvoice::create(['invoice_id'=>$invoice->id,
                                        'product_id'=>$table_pro->product_id,
                                        'price'=>$table_pro->price,
                                        'quantity'=>$table_pro->quantity,
                                        'name'=>$table_pro->name,
                                        'code'=>$table_pro->code,
                                        'image'=>$product->image
                ]);
            }

        TableProduct::query()->delete();

        UserActivity::create([  'name'=>auth()->user()->name,
                                'email'=>auth()->user()->email,
                                'type_activity' => 'زیادکردنی پسوڵەی کڕین'
        ]);
        return redirect()->back();
    }
    public function sellproduct($state){
        $invoice=Invoice::create(['user_id'=>Auth::id(),
                                'state'=>$state
        ]);


        $t_p=TableProduct::all();                  
            foreach($t_p as $table_pro){
                $product=Product::findorfail($table_pro->product_id);

                $oldPath='products/'.$product->image.'';
                $newPath='productInvoice/'.$product->image.'';
                File::copy($oldPath , $newPath);
                
                ProductInvoice::create(['invoice_id'=>$invoice->id,
                                        'product_id'=>$table_pro->product_id,
                                        'price'=>$table_pro->price,
                                        'quantity'=>$table_pro->quantity,
                                        'name'=>$table_pro->name,
                                        'code'=>$table_pro->code,
                                        'image'=>$product->image
                ]);
            }

        TableProduct::query()->delete();

        UserActivity::create([  'name'=>auth()->user()->name,
                                'email'=>auth()->user()->email,
                                'type_activity' => 'زیادکردنی پسوڵەی فرۆشتن'
        ]);
        return redirect()->back();
    }

}
