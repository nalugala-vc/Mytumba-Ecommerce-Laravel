<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:seller');
    }

    public function index(){
        return view('sellers.sellerDash');
    }
}
