<div class="sidebar border-end vh-100">
    <div class="sidebar-header border-bottom p-3">
        <div class="sidebar-brand">Customer Appointment System</div>
    </div>
    <ul class=" list-unstyled p-2">
        <li class="nav1 nav-item mx-2">
            <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}"
                href="{{ route('products.index') }}">Customer</a>
        </li>
        <li class="nav2 nav-item mx-2">
            <a class="nav-link {{ request()->routeIs('appointments.*') ? 'active' : '' }}"
                href="{{ route('appointments.index') }}">Appointments</a>
        </li>
    </ul>
</div>

<style>
    .nav1 .nav-link.active {
        background-color: darkgreen;
        color: #fff;
        border-radius: 6px;
    }
    .nav2 .nav-link.active {
        background-color: midnightblue;
        color: #fff;
        border-radius: 6px;
    }

</style>