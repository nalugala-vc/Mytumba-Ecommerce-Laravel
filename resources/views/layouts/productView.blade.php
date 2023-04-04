<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link rel="stylesheet" href="{{ asset('css/productview.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/e54abc54b9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&family=Fasthand&family=Inter+Tight:ital,wght@0,400;0,600;0,700;1,400&family=Island+Moments&family=Just+Another+Hand&family=Pacifico&family=Poppins:ital,wght@0,400;1,600&family=Rubik:wght@400;500;700&family=Zilla+Slab:ital,wght@0,400;0,500;0,600;1,500&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
@if (session('success'))
<div
    class="cart-popup-success"
    >
    {{ session('success') }}
    </div>
@endif
@if (session('error'))
<div
    class="cart-popup-error"
    >
    {{ session('error') }}
    </div>
@endif
    <nav>
    <div class="logo">
      <a href="/">Mytumba</a>
    </div>
    <ul class="nav-links">
      <li><a href="/men">MEN</a></li>
      <li><a href="/women">WOMEN</a></li>
      <li><a href="/kids">KIDS</a></li>
    </ul>
    <div class="nav-icons">
        <div class="cart">
        <a href="/cart">
            <i class="uil uil-shopping-cart"></i>
            @if(Auth::user())
            <div class="cart-notification">{{$cartCount}}</div>
            @endif
        </a>
        </div>
        <div class="profile">
        @if(Auth::user())
            <img src="/assets/{{Auth::user()->profile_image}}" alt="">
        @else 
            <a href="#"><i class="uil uil-user-circle"></i></a>
        
        @endif
        </div>
    </div>
    <div class="burger">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div>

    </nav>
    <div>
        @yield('content')
    </div>
    <div class="newsletter-section" style="background-image: url('/assets/newsletter-bg.jpeg');">
        <div class="newsletter-content">
            <span class="small-text">Newsletter</span>
            <span class="big-text">
                Sign up for latest updates and offers
            </span>
            <div class="form">
                <input type="text" placeholder="Email Address" />
                <button>Subscribe</button>
            </div>
            <span class="text">
                Will be used in accordance with our Privacy Policy
            </span>
            <span class="social-icons">
                <div class="icon">
                    <i class="fa-brands fa-facebook"></i>
                </div>
                <div class="icon">
                    <i class="fa-brands fa-twitter"></i>
                </div>
                <div class="icon">
                    <i class="fa-brands fa-instagram"></i>
                </div>
            </span>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">our services</a></li>
                        <li><a href="#">privacy policy</a></li>
                        <li><a href="#">affiliate program</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Get Help</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">shipping</a></li>
                        <li><a href="#">returns</a></li>
                        <li><a href="#">order status</a></li>
                        <li><a href="#">payment options</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Online Shop</h4>
                    <ul>
                        <li><a href="#">Zip Jackets</a></li>
                        <li><a href="#">Dresses</a></li>
                        <li><a href="#">Jogging Pants</a></li>
                        <li><a href="#">Hoodies</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4><i class="fa-brands fa-github"></i> nalugala-vc</h4>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/user.js') }}"></script>

</body>
</html>