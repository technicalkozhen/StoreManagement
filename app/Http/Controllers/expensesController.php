<?php

namespace App\Http\Controllers;

use App\Http\Requests\expenseRequest;
use App\Models\expense;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class expensesController extends Controller
{
    public function index()
    {
        $expense=expense::latest()->paginate(10);
        return view('public.expense.index',['expense'=>$expense]);
    }

    public function create()
    {
        return view('public.expense.create');
    }

    public function store(expenseRequest $request)
    {
        
        expense::create([   'title'=>$request->title ,
                            'price'=>$request->price ,
                            'description'=>$request->description,
                            'user_id'=>Auth::id()
    ]);

        UserActivity::create([  'name'=>auth()->user()->name,
                                'email'=>auth()->user()->email,
                                'type_activity' => 'زیادکردنی خەرجی'
        ]);
        return redirect()->back()->with(['msg'=>"بەسەرکەوتووی زیاد کرا"]);

    }

    public function edit($id)
    {
        $expense=expense::findorfail($id);
        return view('public.expense.edit',compact('expense'));
    }

    public function update(expenseRequest $request,$id)
    {

        $expense=expense::findorfail($id);
        $expense->update($request->only('title','price','description'));


        UserActivity::create([  'name'=>auth()->user()->name,
                                'email'=>auth()->user()->email,
                                'type_activity' => 'نوێکردنەوەی خەرجی'
        ]);

        return redirect()->back()->with(['msg'=>'بەسەرکەوتوی نوێ کرایەوە']);
    }
    
    public function destroy($id)
    {
        $exp=expense::findorfail($id);
        $exp->delete();

        UserActivity::create([  'name'=>auth()->user()->name,
                                'email'=>auth()->user()->email,
                                'type_activity' => 'سڕینەوەی خەرجی'
        ]);
        return redirect()->route('expense.index');
    }
}
