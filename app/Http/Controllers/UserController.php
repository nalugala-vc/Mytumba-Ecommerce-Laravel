<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userCart(){
        $products = Product::inRandomOrder()->take(10)->get();
        return view('users.cartItems',[
            'products' => $products
        ]);
    }

    public function womenProducts(){

    }

    public function menProducts(){

    }

    public function kidsProducts(){
    }

    public function addToCart(){

    }

    public function removeFromCart(){
    }

    public function wishList(){
    }

    public function addToWishList(){
    }

    public function removeFromWishList(){
    }



}
