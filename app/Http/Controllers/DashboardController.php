<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
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
        return view('dashboard.dashboard', [
            'products' => Product::where('user_id', Auth::user()->id)->get(),
            'orders' => Order::where('supplier', Auth::user()->id)->get(),
            'myOrders' => Order::where('buyer', Auth::user()->id)->get()
        ]);
    }

    public function userUpdate($id, Request $request)
    {
        $user = User::find($id);
        if ( $user->update($request->all()) ) {
            return redirect('dashboard');
        }
    }

    public function userChangePassword(Request $request)
    {
        $user = User::find($request->id);
        if ( $user->update(['password' => Hash::make($request->password)]) ) {
            return redirect('dashboard');
        }
    }
}
