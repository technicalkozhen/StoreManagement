<?php

namespace App\Http\Controllers;

use App\Models\UserActivity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        UserActivity::create([  'name'=>auth()->user()->name,
                                'email'=>auth()->user()->email,
                                'type_activity' => 'چونەژورەوە'
                            ]);
        return redirect()->route('public');
    }
}
