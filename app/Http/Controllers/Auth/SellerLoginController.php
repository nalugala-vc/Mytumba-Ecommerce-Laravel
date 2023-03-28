<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;

class SellerLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/seller';

    public function __construct()
    {
      $this->middleware('guest:seller');
    }

    public function showLoginForm()
    {
      return view('auth.sellerLogin');
    }

    public function login()
    {
      $this->validate(request(), [
        'email'   => 'required|email',
        'password' => 'required|min:8'
      ]);

      $hashed = DB::table('sellers')->where('id',1)->value('password');

      if (\Illuminate\Support\Facades\Auth::guard('seller')->attempt(['email' => request()->email, 'password' => request()->password])) {
        return redirect()->intended(route('seller'));
      }

    
      return redirect()->back()->withInput(request()->only('email'));
    }
}
