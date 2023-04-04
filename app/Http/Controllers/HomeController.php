<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $products = Product::inRandomOrder()->take(10)->get();
        $cartCount = 0;
        if(Auth::user()){
            $cartCount = Cart::where('user_id', Auth::user()->id)->count();
        }
    
        return view('landingPage',[
            'products' => $products,
            'cartCount' => $cartCount
        ]);
    }
}
