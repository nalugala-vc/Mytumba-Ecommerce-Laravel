@extends('layouts.userlayout')

@section('content')
<section class="product-banner" style="background-image: url('/assets/women-banner.jpg');" >
    <div class="banner-name">
        <h2>WOMEN IN STYLE</h2>
    </div>
</section>
<section class="products-refine" id="products-cat">
    <section class="refinery">
        <div class="heading">
            <h4>REFINE</h4>
            <h4 style="color:red">Clear All</h4>
        </div>
        <div class="refinery-categories">
            <h4>CATEGORIES</h4>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>Zip Jackets</h5>
            </div>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>Dresses</h5>
            </div>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>Jogging Pants</h5>
            </div>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>Hoodies</h5>
            </div>
        </div>
        <div class="refinery-prices">
            <h4>FILTER BY PRICE</h4>
            @yield('slider')

        </div>
        <div class="refinery-size">
            <h4>FILTER BY SIZE</h4>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>XS</h5>
            </div>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>S</h5>
            </div>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>M</h5>
            </div>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>L</h5>
            </div>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>XL</h5>
            </div>
        </div>
        <div class="refinery-prices">
            <h4>FILTER BY DATE</h4>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>New Arrivals</h5>
            </div>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>A Month</h5>
            </div>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>Older Clothes</h5>
            </div>
        </div>
    </section>
    <section class="categories-section">
        <div class="categories-div">
            <div class="top-picks" >
                <div class="img-div">
                    <div class="cart" >
                    <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <img src="/assets/ecomm (1).jpg" alt="Zip jacket" />
                    <div class="wish">
                    <i class="fa-regular fa-heart"></i>
                    </div>
                </div>
                <div class="info-div">
                    <p>cute outfit</p>
                    <h4>499</h4>
                </div>
            </div>
            <div class="top-picks" >
                <div class="img-div">
                    <div class="cart" >
                    <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <img src="/assets/ecomm (2).jpg" alt="Zip jacket" />
                    <div class="wish">
                    <i class="fa-regular fa-heart"></i>
                    </div>
                </div>
                <div class="info-div">
                    <p>cute outfit</p>
                    <h4>499</h4>
                </div>
            </div>
            <div class="top-picks" >
                <div class="img-div">
                    <div class="cart" >
                    <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <img src="/assets/ecomm (3).jpg" alt="Zip jacket" />
                    <div class="wish">
                    <i class="fa-regular fa-heart"></i>
                    </div>
                </div>
                <div class="info-div">
                    <p>cute outfit</p>
                    <h4>499</h4>
                </div>
            </div>
            <div class="top-picks" >
                <div class="img-div">
                    <div class="cart" >
                    <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <img src="/assets/ecomm (4).jpg" alt="Zip jacket" />
                    <div class="wish">
                    <i class="fa-regular fa-heart"></i>
                    </div>
                </div>
                <div class="info-div">
                    <p>cute outfit</p>
                    <h4>499</h4>
                </div>
            </div>
            <div class="top-picks" >
                <div class="img-div">
                    <div class="cart" >
                    <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <img src="/assets/ecomm (5).jpg" alt="Zip jacket" />
                    <div class="wish">
                    <i class="fa-regular fa-heart"></i>
                    </div>
                </div>
                <div class="info-div">
                    <p>cute outfit</p>
                    <h4>499</h4>
                </div>
            </div>
            <div class="top-picks" >
                <div class="img-div">
                    <div class="cart" >
                    <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <img src="/assets/ecomm (6).jpg" alt="Zip jacket" />
                    <div class="wish">
                    <i class="fa-regular fa-heart"></i>
                    </div>
                </div>
                <div class="info-div">
                    <p>cute outfit</p>
                    <h4>499</h4>
                </div>
            </div>
            <div class="top-picks" >
                <div class="img-div">
                    <div class="cart" >
                    <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <img src="/assets/ecomm (7).jpg" alt="Zip jacket" />
                    <div class="wish">
                    <i class="fa-regular fa-heart"></i>
                    </div>
                </div>
                <div class="info-div">
                    <p>cute outfit</p>
                    <h4>499</h4>
                </div>
            </div>
            <div class="top-picks" >
                <div class="img-div">
                    <div class="cart" >
                    <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <img src="/assets/ecomm (8).jpg" alt="Zip jacket" />
                    <div class="wish">
                    <i class="fa-regular fa-heart"></i>
                    </div>
                </div>
                <div class="info-div">
                    <p>cute outfit</p>
                    <h4>499</h4>
                </div>
            </div>
            <div class="top-picks" >
                <div class="img-div">
                    <div class="cart" >
                    <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <img src="/assets/ecomm (10).jpg" alt="Zip jacket" />
                    <div class="wish">
                    <i class="fa-regular fa-heart"></i>
                    </div>
                </div>
                <div class="info-div">
                    <p>cute outfit</p>
                    <h4>499</h4>
                </div>
            </div>
            <div class="top-picks" >
                <div class="img-div">
                    <div class="cart" >
                    <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <img src="/assets/ecomm (11).jpg" alt="Zip jacket" />
                    <div class="wish">
                    <i class="fa-regular fa-heart"></i>
                    </div>
                </div>
                <div class="info-div">
                    <p>cute outfit</p>
                    <h4>499</h4>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection