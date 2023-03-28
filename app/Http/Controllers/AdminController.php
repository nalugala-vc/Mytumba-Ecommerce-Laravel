<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        $totalUsers = User::all()->count();
        $totalProducts = Product::all()->count();
        $totalOrders = Order::all()->count();
        $totalSellers = Seller::all()->count();
        $recentOrders = Product::latest()->count();
        $recentUsers = User::latest()->get();
        return view('admin.adminDash',[
            'totalUsers' => $totalUsers,
            'totalProducts' => $totalProducts,
            'totalOrders' =>$totalOrders,
            'totalSellers' =>$totalSellers,
            'recentOrders' =>$recentOrders,
            'recentUsers' => $recentUsers
        ]);
    }

    /*USER FUNCTIONS*/
    public function addNewUser(){
        return view('admin.addNewUser');
    }

    public function registerUser(){
        request()->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $exists=DB::table('users')->where('email', request()->email)->exists();
        if($exists){
            return redirect()->back()->with('error','Email already exists');
        }

        $file = request()->profile_image;
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('assets', $filename);

        User::create([
            'first_name' => request()->first_name,
            'last_name' => request()->last_name,
            'age' => request()->age,
            'phone_number' => request()->phone_number,
            'county' => request()->county,
            'address' => request()->address,
            'profile_image' => $filename,
            'email' => request()->email,
            'password' => Hash::make(request()->password),

        ]);
        return redirect()->route('viewUsers')->with('success','User Registered  successfully');

    }

    public function viewUsers() {
        $users = User::all();
        return view('admin.viewUsers',[
            'users' => $users
        ]);
    }

    public function editUser($user) {
        $user = User::findOrFail($user);
        return view('admin.editExistingUser',[
            'user'=>$user
        ]);
    }

    public function updateUser($user) {
        $updateUser = [];

        if(request()->hasFile('profile_image')) {
            $file = request()->file('profile_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('assets', $filename);
            $updateUser['profile_image'] = $filename;
        }

        if(request()->filled('password')){
            request()->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $updateUser['password'] = Hash::make(request()->password);
        }

        $updateUser['first_name'] = request()->first_name;
        $updateUser['last_name'] = request()->last_name;
        $updateUser['email'] = request()->email;
        $updateUser['phone_number'] = request()->phone_number;
        $updateUser['address'] = request()->address;
        $updateUser['county'] = request()->county;

        try {
            User::where('id',$user)->update($updateUser);
            return redirect()->route('viewUsers')->with('success','User updated  successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','An error occurred. Try again later');
        }

    }

    public function deleteUser($user) {

        try {
            $user=User::findOrFail($user);
            $user->delete();
            return redirect()->back()->with('success','User Deleted  successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','An error occurred. Try again later');
        }
    }

    /*SELLER FUNCTIONS*/

    public function viewSellers() {
        $sellers = Seller::all();
        return view('admin.viewSellers',[
            'sellers' => $sellers
        ]);
    }

    public function addNewSeller(){
        return view('admin.addNewSeller');
    }

    public function registerSeller(){
        request()->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $exists=DB::table('sellers')->where('email', request()->email)->exists();
        if($exists){
            return redirect()->back()->with('error','Email already exists');
        }

        $file = request()->profile_image;
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('assets', $filename);

        $store = request()->store_picture;
        $storepic = time() . '.' . $store->getClientOriginalExtension();
        $store->move('assets', $storepic);

        Seller::create([
            'first_name' => request()->first_name,
            'last_name' => request()->last_name,
            'age' => request()->age,
            'phone_number' => request()->phone_number,
            'county' => request()->county,
            'address' => request()->address,
            'profile_image' => $filename,
            'email' => request()->email,
            'store_name'=> request()->store_name,
            'store_picture' => $storepic,
            'password' => Hash::make(request()->password),

        ]);

        return redirect()->route('viewSellers')->with('success','Seller Registered  successfully');

    }

    public function editSeller($seller) {
        $seller = Seller::findOrFail($seller);
        return view('admin.editExistingSeller',[
            'seller'=>$seller
        ]);
    }

    public function updateSeller($seller) {
        $updateSeller = [];

        if(request()->hasFile('profile_image')) {
            $file = request()->file('profile_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('assets', $filename);
            $updateSeller['profile_image'] = $filename;
        }

        if(request()->hasFile('store_picture')) {
            $file = request()->file('store_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('assets', $filename);
            $updateSeller['store_picture'] = $filename;
        }

        if(request()->filled('password')){
            request()->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $updateSeller['password'] = Hash::make(request()->password);
        }

        $updateSeller['first_name'] = request()->first_name;
        $updateSeller['last_name'] = request()->last_name;
        $updateSeller['email'] = request()->email;
        $updateSeller['phone_number'] = request()->phone_number;
        $updateSeller['address'] = request()->address;
        $updateSeller['county'] = request()->county;

        try {
            Seller::where('id',$seller)->update($updateSeller);
            return redirect()->route('viewSellers')->with('success','Seller updated  successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','An error occurred. Try again later');
        }
    }

    public function deleteSeller($seller) {
        try {
            $seller=Seller::findOrFail($seller);
            $seller->delete();
            return redirect()->back()->with('success','Seller Deleted  successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','An error occurred. Try again later');
        }
    }

    /*PRODUCT FUNCTIONS*/
    public function viewProducts() {
        $products = Product::all();
        return view('admin.viewProducts',[
            'products' => $products,
        ]);
    }

    public function addNewProduct(){
        $categories = Category::all();
        return view('admin.addNewProduct',[
            'categories' => $categories
        ]);
    }

    public function addProduct(){
        // dd(request());
        $picturesArray= array();

    
        $files = request()->pictures;
        foreach ( $files as $file){
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('assets', $filename);
            $picturesArray[] = $filename;
        }


        if(request()->seller_id){
            $product['seller_id'] = request()->seller_id;
        }

        $product['name'] = request()->name;
        $product['description'] = request()->description;
        $product['pictures'] = implode('|', $picturesArray);
        $product['tags'] = request()->tags;
        $product['sizes'] = request()->sizes;
        $product['colors'] = request()->colors;
        $product['price'] = request()->price;
        $product['quantity'] = request()->quantity;
        $product['sub_category'] = request()->sub_category;
        $product['category'] = request()->category;

        $addProduct = Product::create($product);

        return redirect()->route('viewProducts')->with('success','Product Added  successfully');

    }

    public function editProduct($product) {
        $product = Product::findOrFail($product);
        $categories = Category::all();
        return view('admin.editExistingProduct',[
            'product' => $product,
            'categories'=>$categories
        ]);
    }

    public function updateProduct($product) {
        $picturesArray= array();
        $updateProduct = [];
    
        if(request()->pictures){
            $files = request()->pictures;
            foreach ( $files as $file){
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('assets', $filename);
                $picturesArray[] = $filename;
            }
            $updateProduct['pictures'] = implode('|', $picturesArray);
        }

        if(request()->seller_id){
            $updateProduct['seller_id'] = request()->seller_id;
        }

        $updateProduct['name'] = request()->name;
        $updateProduct['description'] = request()->description;
        $updateProduct['category'] = request()->category;
        $updateProduct['tags'] = request()->tags;
        $updateProduct['sizes'] = request()->sizes;
        $updateProduct['colors'] = request()->colors;
        $updateProduct['price'] = request()->price;
        $updateProduct['quantity'] = request()->quantity;
        $updateProduct['sub_category'] = request()->sub_category;
        $updateProduct['discount_present'] = request()->discount_present;
        $updateProduct['discount_price'] = request()->discount_price;

        try {
            Product::where('id',$product)->update($updateProduct);
            return redirect()->route('viewProducts')->with('success','Product Updated  successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','An error occurred. Try again later');
        }

    }

    public function deleteProduct($product) {
        try {
            $product=Product::findOrFail($product);
            $product->delete();
            return redirect()->back()->with('success','Product Deleted  successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','An error occurred. Try again later');
        }
    }
}
