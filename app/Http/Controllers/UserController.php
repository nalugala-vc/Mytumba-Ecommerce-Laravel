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
        $cartCount = null;
        if(Auth::user()){
            $cartCount = Cart::where('user_id', Auth::user()->id)->count();
        }

        return view('users.productView',[
            'product' => $product,
            'cartCount' => $cartCount
        ]);
    }
    public function userCart(){
        if(!Auth::user()){
            return redirect('/login')->with('error','Please login to view your cart');
        }
        $cartCount = null;
        if(Auth::user()){
            $cartCount = Cart::where('user_id', Auth::user()->id)->count();
        }

        $cartItems = Cart::where('user_id', Auth::user()->id)
        ->orderBy('created_at', 'desc')
        ->with('product:id,name,category,price,discount_present,discount_price', 'product.categoryP:id,category_name')
        ->get();



        return view('users.cartItems',[
            'cartItems' => $cartItems,
            'cartCount' => $cartCount
        ]);
    }

    public function womenProducts(){
        $products = Product::where('category',2)->get();
        $cartCount = null;
        if(Auth::user()){
            $cartCount = Cart::where('user_id', Auth::user()->id)->count();
        }

        return view('users.women',[
            'products' => $products,
            'cartCount' => $cartCount
        ]);

    }

    public function menProducts(){
        $products = Product::where('category',1)->get();
        $cartCount = null;
        if(Auth::user()){
            $cartCount = Cart::where('user_id', Auth::user()->id)->count();
        }

        return view('users.men',[
            'products' => $products,
            'cartCount' => $cartCount
        ]);
    }

    public function kidsProducts(){
        $products = Product::where('category',3)->get();
        $cartCount = null;
        if(Auth::user()){
            $cartCount = Cart::where('user_id', Auth::user()->id)->count();
        }

        return view('users.kids',[
            'products' => $products,
            'cartCount' => $cartCount
        ]);
    }

    public function addToCart(){
        if (!Auth::user()) {
            return response()->json([ 
                'redirect' => '/login',        
                'message' => 'Please login to add to cart'   
            ]);
        }
        
        $cartItem = Cart::where('product_id',request()->product_id)->where('user_id',Auth::user()->id)->first();
        $quantity = 1;

        if($cartItem){
            return response()->json(['status' => 'error', 'message' => 'Item already in cart','statuscode'=> 403]);
        }

        if(request()->quantity ){
            $quantity = request()->quantity;
        }

        Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => request()->product_id,
            'quantity' => $quantity
        ]);

        return response()->json(['status' => 'success', 'message' => 'Item added to cart successfully','statuscode'=> 200]);


    }

    public function getCartCount()
    {
        $cartCount = 0;
        if(Auth::user()){
            $cartCount = Cart::where('user_id', Auth::user()->id)->count();
        }
        return response()->json(['cartCount' => $cartCount]);
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

        return response()->json(['status' => 'success', 'message' => 'Item removed from cart successfully','statuscode'=> 200]);
    }

    public function filterWomen($myParam){
        $param = $myParam;
        $products = null;


        switch ($param) {
        case 'zip_jackets':
            $products = Product::where('category', 2)
                    ->where('sub_category', 'zip jackets')
                    ->get();
            break;
        case 'dresses':
            $products = Product::where('category', 2)
                    ->where('sub_category', 'dresses')
                    ->get();
            break;
        case 'jogging':
            $products = Product::where('category', 2)
                    ->where('sub_category', 'jogging pants')
                    ->get();
            break;
        case 'hoodies':
            $products = Product::where('category', 2)
                    ->where('sub_category', 'hoodies')
                    ->get();
            break;
        case 'highest':
            $products = Product::where('category', 2)
                    ->orderBy('price', 'desc')
                    ->get();
            break;
        case 'lowest':
            $products = Product::where('category', 2)
            ->orderBy('price', 'asc')
            ->get();
            break;
        case 'new':
            $products = Product::where('category', 2)
                    ->orderBy('created_at', 'desc')
                    ->get();
            break;
        case 'old':
            $products = Product::where('category', 2)
                    ->orderBy('created_at', 'asc')
                    ->get();
            break;
        default:
            $products = Product::where('category', 2)
                ->get();
        }

        if(Auth::user()){
            $cartCount = Cart::where('user_id', Auth::user()->id)->count();
        }

        return response()->json([
            'products' => $products->toArray(),
        ]);

    }

    public function filterKids($myParam){
        $param = $myParam;
        $products = null;


        switch ($param) {
        case 'zip_jackets':
            $products = Product::where('category', 3)
                    ->where('sub_category', 'zip jackets')
                    ->get();
            break;
        case 'dresses':
            $products = Product::where('category', 3)
                    ->where('sub_category', 'dresses')
                    ->get();
            break;
        case 'jogging':
            $products = Product::where('category', 3)
                    ->where('sub_category', 'jogging pants')
                    ->get();
            break;
        case 'hoodies':
            $products = Product::where('category', 3)
                    ->where('sub_category', 'hoodies')
                    ->get();
            break;
        case 'highest':
            $products = Product::where('category', 3)
                    ->orderBy('price', 'desc')
                    ->get();
            break;
        case 'lowest':
            $products = Product::where('category', 3)
            ->orderBy('price', 'asc')
            ->get();
            break;
        case 'new':
            $products = Product::where('category', 3)
                    ->orderBy('created_at', 'desc')
                    ->get();
            break;
        case 'old':
            $products = Product::where('category', 3)
                    ->orderBy('created_at', 'asc')
                    ->get();
            break;
        default:
            $products = Product::where('category', 3)
                ->get();
        }

        if(Auth::user()){
            $cartCount = Cart::where('user_id', Auth::user()->id)->count();
        }

        return response()->json([
            'products' => $products->toArray(),
        ]);

    }

    public function filterMen($myParam){
        $param = $myParam;
        $products = null;


        switch ($param) {
        case 'zip_jackets':
            $products = Product::where('category', 1)
                    ->where('sub_category', 'zip jackets')
                    ->get();
            break;
        case 'jogging':
            $products = Product::where('category', 1)
                    ->where('sub_category', 'jogging pants')
                    ->get();
            break;
        case 'hoodies':
            $products = Product::where('category', 1)
                    ->where('sub_category', 'hoodies')
                    ->get();
            break;
        case 'highest':
            $products = Product::where('category', 1)
                    ->orderBy('price', 'desc')
                    ->get();
            break;
        case 'lowest':
            $products = Product::where('category', 1)
            ->orderBy('price', 'asc')
            ->get();
            break;
        case 'new':
            $products = Product::where('category', 1)
                    ->orderBy('created_at', 'desc')
                    ->get();
            break;
        case 'old':
            $products = Product::where('category', 1)
                    ->orderBy('created_at', 'asc')
                    ->get();
            break;
        default:
            $products = Product::where('category', 1)
                ->get();
        }

        if(Auth::user()){
            $cartCount = Cart::where('user_id', Auth::user()->id)->count();
        }

        return response()->json([
            'products' => $products->toArray(),
        ]);

    }


    public function orderItems(Request $request){
        $orderTotal = $request->input('orderTotal');
        $items = json_decode($request->input('items'));

        session()->put('items', $items);
        session()->put('orderTotal', $orderTotal);

        return redirect('/confirmOrder');
    }

    public function confirmOrder(){
        $items = session()->get('items');
        $orderTotal = session()->get('orderTotal');
        $cartCount = null;
        if(Auth::user()){
            $cartCount = Cart::where('user_id', Auth::user()->id)->count();
        }

        return view('users.confirmOrder',[
            'items'=>$items,
            'orderTotal'=>$orderTotal,
            'cartCount'=>$cartCount
        ]);
    }

    public function malipo($orderId){
        $callbackJSONData = file_get_contents("php://input");

        $logFile = "stkPush.json";
        $log = fopen($logFile,"a");
        fwrite($log,$callbackJSONData.$orderId);
        fclose($log);

        $callbackData = json_decode($callbackJSONData);

        $resultCode = $callbackData->Body->stkCallback->ResultCode;
        $resultDesc = $callbackData->Body->stkCallback->ResultDesc;
        $metadata = $callbackData->Body->stkCallback->CallbackMetadata;
        $amount = '';
        foreach ($metadata as $item) {
            if ($item->Name == 'Amount') {
                $amount = $item->Value;
                break;
            }
        }

        if($resultCode == 0) {
            //insert in payments folder
            //update unpaid to paid;
            //thankyou message
        }
    }

    public function mpesa($phone,$amount,$invoice){
        define('CALLBACK_URL','http://127.0.0.1:8000/malipo/');
        //Access Tokens
        $consumerKey = 'LuR7UuV3BRGfW7ZXwq7eb0ojkjI0oKoX';
        $consumerSecret = 'L2lkKRA8NOAW21Up';

        //Other Required Details

        $BusinessShortCode = '174379';
        $PassKey  = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $phone = preg_replace('/^0/','254',str_replace("+","",$phone));
        $PartyA = $phone;
        $PartyB = '174379';
        $TransactionDesc = 'Pay Order';
        $Timestamp = time();
        $Password = base64_encode($BusinessShortCode.$PassKey.$Timestamp);

        /*HEADERS*/
        $headers = ['Content-Type:application/json ; charset=utf-8'];

        /*MPESA ENDPOINTS*/
        $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials
        &client_id=LuR7UuV3BRGfW7ZXwq7eb0ojkjI0oKoX
        &client_secret=L2lkKRA8NOAW21Up
        ';
        $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest
        ';

        $curl = curl_init($access_token_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER,$headers );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,TRUE);
        curl_setopt($curl, CURLOPT_HEADER, FALSE);
        curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
        $result = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $result = json_decode($result);
        dd($result);
        $access_token = $result->access_token;

        dd($result);

        curl_close($curl);

        $stkheader = ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,$initiate_url);
        curl_setoption($curl,CURLOPT_HTTPHEADER,$stkheader);

        /*REQUEST PARAMETERS*/
        $curl_post_data = array(
        'BusinessShortCode'	=> $BusinessShortCode,
        'Password'	=> $Password,
        'Timestamp'	=> $Timestamp,
        'TransactionType'	=> 'CustomerPayBillOnline',
        'Amount' => $amount,
        'PartyA' => $PartyA,
        'PartyB' => $PartyB,
        'callBackURL'	=> CALLBACK_URL.$invoice,
        'AccountReference'	=> $invoice,
        'TransactionDesc'	=> $TransactionDesc
        );

        $data_string = json_encode($curl_post_data);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl , CURLOPT_POST, true);
        curl_setopt($curl , CURLOPT_POSTFIELDS,$data_string);
        $curl_response = curl_exec($curl);

        $res = (array)(json_decode($curl_response));
        $ResponseCode = $res['ResponseCode'];

        return $ResponseCode;
        
    }

    public function lipaNaMpesa(){
        request()->validate([
            'name'=>'required',
            'amount'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);

    $amount = request()->amount;; //Amount to transact 
    $phonenumber = request()->phone; // Phone number paying
    
    $Account_no = '32476'; // Enter account number optional
    $url = 'https://tinypesa.com/api/v1/express/initialize';
    $data = array(
        'amount' => $amount,
        'msisdn' => $phonenumber,
        'account_no'=>$Account_no
    );
    $headers = array(
        'Content-Type: application/x-www-form-urlencoded',
        'ApiKey: iGYdTS57089' // Replace with your api key
     );
    $info = http_build_query($data);
    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $info);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $resp = curl_exec($curl);
    $msg_resp = json_decode($resp);
    
    
    if ($msg_resp ->success == 'true') {
        echo "WAIT FOR  STK POP UP🔥";
      } else {
        echo "Transaction Failed";
       
      }
    }




}
