@extends('layouts.adminLayout')
@section('head-title')
<div class="left">
    <h1>Dashboard</h1>
    <ul class="breadcrumb">
        <li>
            <a href="#">Dashboard</a>
        </li>
        <li><i class='bx bx-chevron-right' ></i></li>
        <li>
            <a class="active" href="#">Home</a>
        </li>
    </ul>
</div>
<a href="#" class="btn-download">
    <i class='bx bxs-cloud-download' ></i>
    <span class="text">Download PDF</span>
</a>
@endsection
@section('content')
<ul class="box-info">
    <a href="">
        <li>
            <i class='bx bxs-dollar-circle' ></i>
            <span class="text">
                <h3>{{$totalOrders}}</h3>
                <p>Orders</p>
            </span>
        </li>
    </a>
    <a href="/admin/users">
        <li>
            <i class='bx bxs-group' ></i>
            <span class="text">
                <h3>{{$totalUsers}}</h3>
                <p>Users</p>
            </span>
        </li>
    </a>
    <a href="/admin/products">
        <li>
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
                <h3>{{$totalProducts}}</h3>
                <p>Products</p>
            </span>
        </li>
    </a>
    <a href="/admin/sellers">
        <li>
            <i class='bx bxs-user-account'></i>
            <span class="text">
                <h3>{{$totalSellers}}</h3>
                <p>Sellers</p>
            </span>
        </li>
    </a>
</ul>
<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Recent Orders</h3>
            <i class='bx bx-search' ></i>
            <i class='bx bx-filter' ></i>
        </div>
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Date Order</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status completed">Completed</span></td>
                </tr>
                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status pending">Pending</span></td>
                </tr>
                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status process">Process</span></td>
                </tr>
                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status pending">Pending</span></td>
                </tr>
                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status completed">Completed</span></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="order todo">
        <div class="head">
            <h3>Recent Users</h3>
            <i class='bx bx-plus' ></i>
            <i class='bx bx-filter' ></i>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Profile Image</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentUsers as $user)
                <tr>
                    <td>
                        <img src="/assets/{{$user->profile_image}}">
                    </td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                </tr>
                @empty
                <h2>No Users</h2>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection