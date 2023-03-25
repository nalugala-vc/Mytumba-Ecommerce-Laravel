<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/e54abc54b9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&family=Fasthand&family=Inter+Tight:ital,wght@0,400;0,600;0,700;1,400&family=Island+Moments&family=Just+Another+Hand&family=Pacifico&family=Poppins:ital,wght@0,400;1,600&family=Rubik:wght@400;500;700&family=Zilla+Slab:ital,wght@0,400;0,500;0,600;1,500&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="top-part">
            <div class="socials">
                <div><i class="fa-brands fa-facebook"></i></div>
                <div><i class="fa-brands fa-twitter"></i></div>
                <div><i class="fa-brands fa-instagram"></i></div>
            </div>
            <div class="seller">
                <p>want to sell on <b>Mytumba</b>? click <a href="">here</a></p>
            </div>
            <div class="account">
                <i class="fa-regular fa-user"></i>
                <p>My Account</p>
                <i class="fa-solid fa-caret-down"></i>
            </div>
        </div>
        <div class="bottom-part">
            <span class="logo">
                <i class="fa-solid fa-dove"></i>
                <h2>Mytumba</h2>
            </span>
            <div class="search-div">
                <input type="text" name="" id="" placeholder="search">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div class="controls">
                <i class="fa-regular fa-heart"></i>
                <i class="fa-solid fa-cart-shopping"></i>
                <i class="fa-solid fa-toggle-off"></i>
            </div>
        </div>
        
    </nav>
    <section>
        @yield('content')
    </section>
    <script src="{{ asset('js/user.js') }}"></script>

</body>
</html>