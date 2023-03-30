<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function productView($product){
        $product = Product::findOrFail($product);

        return view('users.productView',[
            'product' => $product,
        ]);
    }
    public function userCart(){
        if(!Auth::user()){
            return redirect('/login')->with('error','Please login to view your cart');
        }

        $cartItems = Cart::where('user_id', Auth::user()->id)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('users.cartItems',[
            'cartItems' => $cartItems
        ]);
    }

    public function womenProducts(){
        $products = Product::where('category',2)->get();

        return view('users.women',[
            'products' => $products
        ]);

    }

    public function menProducts(){
        $products = Product::where('category',1)->get();

        return view('users.men',[
            'products' => $products
        ]);
    }

    public function kidsProducts(){
        $products = Product::where('category',3)->get();

        return view('users.kids',[
            'products' => $products
        ]);
    }

    public function addToCart(){
        if(!Auth::user()){
            return redirect('/login')->with('error','Please login to add to cart');
        }

        $cartItem = Cart::where('product_id',request()->product_id)->where('user_id',Auth::user()->id)->first();

        if($cartItem){
            return redirect()->back()->with('error','Item already in cart');
        }

        Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => request()->product_id
        ]);

        return redirect()->back()->with('success', 'Item added to cart successfully')->withFragment('#top-picks');


    }

    public function removeFromCart($cartItem){
        $cartItem = Cart::findOrFail($cartItem);

        $cartItem->delete();

        return redirect()->back()->with('success','Item removed from cart successfully');

    }

    public function wishList(){
    }

    public function addToWishList(){
        if(!Auth::user()){
            return redirect('/login')->with('error','Please login to add to wish list');
        }

        Wishlist::create([
            'user_id'=> Auth::user()->id,
            'product_id'=> request()->product_id,
        ]);

        return redirect()->back()->with('success', 'Item added to wishlist successfully')->withFragment('#top-picks');
    }

    public function removeFromWishList($wishList){
        $wishList = Wishlist::findOrFail($wishList);

        $wishList->delete();

        return redirect()->back()->with('success','Item removed from wishlist successfully');
    }

    public function orderItems(Request $request){
        $orderTotal = $request->input('orderTotal');
        echo($orderTotal);

        return "order successfull".$orderTotal;
    }



}
