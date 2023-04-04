@extends('layouts.adminLayout')
@section ('head-title')
<div class="left">
    <h1>Edit Product</h1>
    <ul class="breadcrumb">
        <li>
            <a href="#">Dashboard</a>
        </li>
        <li><i class='bx bx-chevron-right' ></i></li>
        <li>
            <a class="active" href="#">Products</a>
        </li>
    </ul>
</div>
<a href="{{ route('viewProducts')}}" class="btn-download">
    <i class='bx bxs-shopping-bags' ></i>
    <span class="text">View Products</span>
</a>
@endsection
@section ('content')
<form id="editUser" method = "POST" action="{{ route('updateProduct', ['product' => $product->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @if($errors->any())
        <span class="red" role="alert">
            <strong>{{ $errors->first() }}</strong>
        </span>
    @endif
    <div class="edit-user">
        <div class="input-div">
            <div class="label">
                <BiUserPlus class="icon"/>
                <span>Name</span>
            </div>
            <input 
                type="text"
                name="name"
                autoComplete="off"
                required
                value="{{ $product->name}}"
                placeholder="Name"
            />
        </div>
        <div class="input-div">
            <div class="label">
                <BiUserCheck class="icon"/>
                <span>Description</span>
            </div>
            <input 
                type="text"
                name="description"
                autoComplete="off"
                required
                value="{{ $product->description}}"
                placeholder="Description"
            />
        </div>
        <div class="input-div">
            <div class="label">
                <BiMailSend class="icon"/>
                <span>Pictures (max 5 images)</span>
            </div>
            <input 
                type="file"
                name="pictures[]"
                autoComplete="off"
                multiple
            
            />
        </div>
        <div class="input-div">
            <div class="label">
                <RiLockPasswordFill class="icon"/>
                <span>Tags</span>
            </div>
            <input 
                type="text"
                name="tags"
                autoComplete="off"
                required
                value="{{ $product->tags}}"
                placeholder="Tags (separate with coma)"
            />
        </div>
        <div class="input-div">
            <div class="label">
                <RiLockPasswordLine class="icon"/>
                <span>Sizes</span>
            </div>
            <input 
                type="text"
                name="sizes"
                autoComplete="off"
                required
                value="{{ $product->sizes}}"
                placeholder="Sizes(separate with comma)"
            />
        </div>
        <div class="input-div">
            <div class="label">
                <BiImageAdd class="icon"/>
                <span>Colors</span>
            </div>
            <input 
                type="text"
                name="colors"
                required
                value="{{ $product->colors}}"
                placeholder="Colors (separate with commas)"
            />
        </div>
        <div class="input-div">
            <div class="label">
                <BsFillPhoneVibrateFill class="icon"/>
                <span>Price</span>
            </div>
            <input 
                type="number"
                name="price"
                autoComplete="off"
                required
                value="{{ $product->price}}"
                placeholder="Price"
            />
        </div>
        <div class="input-div">
            <div class="label">
                <FaRegAddressCard class="icon"/>
                <span>Quantity</span>
            </div>
            <input 
                type="number"
                name="quantity"
                autoComplete="off"
                required
                value="{{ $product->quantity }}"
                placeholder="Quantity"
            />
        </div>
        <div class="input-div">
            <div class="label">
                <MdOutlineCategory class="icon"/>
                <span>Category</span>
            </div>
            <select name="category" >
                <option value="{{$product->category}}">{{$product->categoryP->category_name}}</option>
                @foreach($categories as $cat)
                <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="input-div">
            <div class="label">
                <MdOutlineCategory class="icon"/>
                <span>Sub-category</span>
            </div>
            <select name="sub_category" >
                <option value="{{$product->sub_category}}">{{$product->sub_category}}</option>
                <option value="zip jackets">Zip Jackets</option>
                <option value="dresses">Dresses</option>
                <option value="jogging pants">Jogging Pants</option>
                <option value="hoodies">Hoodies</option>
            </select>
        </div>
        <div class="input-div">
            <div class="label">
                <MdOutlineCategory class="icon"/>
                <span>Discount?</span>
            </div>
            <select name="discount_present" >
                <option value="{{$product->discount_present}}">{{$product->discount_present}}</option>
                <option value="true">Yes</option>
                <option value="false">No</option>
            </select>
        </div>
        <div class="input-div">
            <div class="label">
                <BsFillPhoneVibrateFill class="icon"/>
                <span>Discount Price</span>
            </div>
            <input 
                type="number"
                name="discount_price"
                autoComplete="off"
                required
                value="{{ $product->discount_price}}"
                placeholder="0"
            />
        </div>
    </div>
    <button 
        type="submit" 
        class="submit-btn" 
        >Edit Product</button>
    </form>
@endsection