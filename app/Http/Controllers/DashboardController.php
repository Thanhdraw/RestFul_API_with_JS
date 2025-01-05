<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        // $user = auth()->user();
        // return $user->role->name;
        return view('admin.dashboard');
    }

    public function transation()
    {
        $transitions = DB::table('orders')->get();
        return view('admin.checkout.index', compact('transitions'));
    }

}
