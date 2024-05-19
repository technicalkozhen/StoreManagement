<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
        $user=User::latest()->paginate(10);
        return view('public.user.index',['user'=>$user]);
    }

    public function create()
    {
        return view('public.user.create');
    }

    public function store(userRequest $request)
    {
        
        User::create($request->only('name','email','password','role'));

        UserActivity::create([  'name'=>auth()->user()->name,
                                'email'=>auth()->user()->email,
                                'type_activity' => 'زیادکردنی بەکارهێنەر'
        ]);
        return redirect()->back()->with(['msg'=>"بەسەرکەوتووی زیاد کرا"]);

    }

    public function edit($id)
    {
        $user=User::findorfail($id);
        return view('public.user.edit',compact('user'));
    }

    public function update(userRequest $request,$id)
    {

        $user=User::findorfail($id);
        if($request->password){
            $user->update($request->only('name','email','password','role'));
        }else{
            $user->update($request->only('name','email','role'));
        }


        UserActivity::create([  'name'=>auth()->user()->name,
                                'email'=>auth()->user()->email,
                                'type_activity' => 'نوێکردنەوەی بەکارهێنەر'
        ]);

        return redirect()->back()->with(['msg'=>'بەسەرکەوتوی نوێ کرایەوە']);
    }
    
    public function destroy($id)
    {
        $user=User::findorfail($id);
        $user->delete();

        UserActivity::create([  'name'=>auth()->user()->name,
                                'email'=>auth()->user()->email,
                                'type_activity' => 'سڕینەوەی بەکارهێنەر'
        ]);
        return redirect()->route('user.index');
    }
}
