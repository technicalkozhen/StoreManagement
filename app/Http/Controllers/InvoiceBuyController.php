<?php

namespace App\Http\Controllers;

use App\Http\Requests\productInvoiceRequest;
use App\Models\Invoice;
use App\Models\ProductInvoice;
use Illuminate\Http\Request;

class InvoiceBuyController extends Controller
{

    public function index()
    {
        $invoice=Invoice::where('state',1)->with('productinvoices')->with('users')->latest()->paginate(10);
        $totalprice=0;
        $number_invoice=0;
        foreach($invoice as $data){
            $number_invoice=$number_invoice+1;
        }

        
        return view('public.invoice.invoiceBuy.index',compact('invoice','number_invoice','totalprice'));
        
        
    }


    public function show($id)
    {
        $product=ProductInvoice::where('invoice_id',$id)->latest()->paginate(6);
        return view('public.invoice.invoiceBuy.show',compact('product'));
    }

   
    public function edit($id)
    {
        $product=ProductInvoice::findorfail($id);
        return view('public.invoice.invoiceBuy.edit',compact('product'));
    }

 
    public function update(productInvoiceRequest $request, $id)
    {
        $product_invoice=ProductInvoice::where('invoice_id',$id)->where('product_id',$request->prod_id)->first();
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

        return redirect()->back()->with(['msg'=>'بەسەرکەوتوی نوێ کرایەوە']);
    }

    public function destroy($id)
    {
        $p_i=ProductInvoice::where('invoice_id',$id);
        foreach($p_i as $data){
            $path='productInvoice/'.$data->image.'';
            if(file_exists($path)){
            unlink($path);
        }
        }
        $p_i->delete();

    }
}
