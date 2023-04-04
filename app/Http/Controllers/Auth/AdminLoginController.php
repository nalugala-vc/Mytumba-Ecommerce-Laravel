<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
      $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
      $cartCount = 0;
      if(Auth::user()){
          $cartCount = Cart::where('user_id', Auth::user()->id)->count();
      }
      return view('auth.adminLogin',[
        'cartCount' => $cartCount
      ]);
    }

    public function login()
    {
      $this->validate(request(), [
        'email'   => 'required|email',
        'password' => 'required|min:8'
      ]);

      $hashed = DB::table('admins')->where('id',1)->value('password');

      if (\Illuminate\Support\Facades\Auth::guard('admin')->attempt(['email' => request()->email, 'password' => request()->password])) {
        return redirect()->intended(route('admin'));
      }

    
      return redirect()->back()->withInput(request()->only('email'));
    }
}
