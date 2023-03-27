<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;

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
        // dd(request());
        // request()->validate([
        //     'first_name' => ['required', 'string', 'max:255'],
        //     'last_name' => ['required', 'string', 'max:255'],
        //     'age' => ['required', 'integer'],
        //     'phone_number' => ['required', 'string', 'max:255'],
        //     'county' => ['required', 'string', 'max:255'],
        //     'address' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);

        $file = request()->profile_image;
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('assets', $filename);

        try {
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
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','An error occurred. Try again later');
        }
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
        // dd(request());
        // request()->validate([
        //     'first_name' => ['required', 'string', 'max:255'],
        //     'last_name' => ['required', 'string', 'max:255'],
        //     'age' => ['required', 'integer'],
        //     'phone_number' => ['required', 'string', 'max:255'],
        //     'county' => ['required', 'string', 'max:255'],
        //     'address' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);

        $file = request()->profile_image;
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('assets', $filename);

        try {
            Seller::create([
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
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','An error occurred. Try again later');
        }
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
            'products' => $products
        ]);
    }

    public function addNewProduct(){
        return view('admin.addNewProduct');
    }

    public function addProduct(){
        $file = request()->profile_image;
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('assets', $filename);

        
            
    }

    public function editProduct() {
        return view('admin.editExistingProduct');
    }

    public function updateProduct() {
    }

    public function deleteProduct() {
    }
}
