<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&family=Fasthand&family=Inter+Tight:ital,wght@0,400;0,600;0,700;1,400&family=Island+Moments&family=Just+Another+Hand&family=Pacifico&family=Poppins:ital,wght@0,400;1,600&family=Rubik:wght@400;500;700&family=Zilla+Slab:ital,wght@0,400;0,500;0,600;1,500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e54abc54b9.js" crossorigin="anonymous"></script>

	<title>AdminHub</title>
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
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="{{ route('admin') }}" class="brand">
            <i class="fa-solid fa-dove"></i>
			<span class="text">Mytumba</span>
		</a>
		<ul class="side-menu top">
			<li class="{{ Request::is('admin') ? 'active' : '' }}">
				<a href="{{ route('admin') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="{{ Request::is('admin/products*') ? 'active' : '' }}">
				<a href="{{ route('viewProducts') }}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Products</span>
				</a>
			</li>
			<li class="{{ Request::is('admin/orders*') ? 'active' : '' }}">
				<a href="{{ route('viewOrders') }}">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Orders</span>
				</a>
			</li>
			<li class="{{ Request::is('admin/sellers*') ? 'active' : '' }}">
				<a href="{{ route('viewSellers') }}">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Sellers</span>
				</a>
			</li>
			<li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
				<a href="{{ route('viewUsers') }}">
					<i class='bx bxs-group' ></i>
					<span class="text">Users</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="{{ route('logout') }}" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
			<li>
				<a href="">
					<i class="fa-solid fa-user"></i>
					<span>{{ Auth::guard('admin')->user()->first_name }} {{ Auth::guard('admin')->user()->last_name }}</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
			<img src="/assets/{{ Auth::guard('admin')->user()->profile_image }}">

			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				@yield('head-title')
			</div>

			@yield('content')
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>