<?php

namespace App\Http\Controllers;

use App\Http\Requests\productInvoiceRequest;
use App\Models\Invoice;
use App\Models\ProductInvoice;
use App\Models\UserActivity;
use Illuminate\Http\Request;

class InvoiceSellController extends Controller
{
    public function index()
    {
        $invoice=Invoice::where('state',0)->with('productinvoices')->with('users')->latest()->paginate(10);
        $totalprice=0;
        return view('public.invoice.invoiceSell.index',compact('invoice','totalprice'));
        
        
    }


    public function show($id)
    {
        $product=ProductInvoice::where('invoice_id',$id)->latest()->paginate(6);
        return view('public.invoice.invoiceSell.show',compact('product'));
    }

   
    public function edit($id)
    {
        $product=ProductInvoice::findorfail($id);
        return view('public.invoice.invoiceSell.edit',compact('product'));
    }

    public function update(productInvoiceRequest $request, $id)
    {
        $product_invoice=ProductInvoice::findorfail($id);
        if($request->file){
            $path='productInvoice/'.$product_invoice->image.'';
            if(file_exists($path)){
                unlink($path);
            }
            $image=$request->file('file')->hashName();
            $request->file('file')->move('productInvoice',$image);
            $request->merge(['image'=>$image]);

            $product_invoice->update($request->only('name','price','code','quantity','image'));

        }else{
            $product_invoice->update($request->only('name','price','code','quantity'));

        };

        UserActivity::create([  'name'=>auth()->user()->name,
                                'email'=>auth()->user()->email,
                                'type_activity' => 'نوێ کردنەوەی پسوڵەی فرۆشتن'
                            ]);

        return redirect()->back()->with(['msg'=>'بەسەرکەوتوی نوێ کرایەوە']);
    }

    public function destroy($id)
    {
        $prod_invoice=ProductInvoice::where('id',$id);
        foreach($prod_invoice as $data){
            $path='productInvoice/'.$data->image.'';
            if(file_exists($path)){
            unlink($path);
        }
        }
        $prod_invoice->delete();

        UserActivity::create([  'name'=>auth()->user()->name,
                                'email'=>auth()->user()->email,
                                'type_activity' => 'سڕینەوەی بەرهەمی پسوڵەی فرۆشتن'
                            ]);
        return redirect()->back();

    }

    public function deleteInvoice($id)
    {
        $invoice=Invoice::findorfail($id);
        $prod_invoice=ProductInvoice::where('invoice_id',$id)->get();
        foreach($prod_invoice as $data){
            $path='productInvoice/'.$data->image.'';
            if(file_exists($path)){
            unlink($path);
        }
        }
        $invoice->delete();

        UserActivity::create([  'name'=>auth()->user()->name,
                                'email'=>auth()->user()->email,
                                'type_activity' => ' سڕینەوەی پسوڵەی فرۆشتن'
                            ]);
        return redirect()->back();

    }
}
