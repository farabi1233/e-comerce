@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
{{-- @dd($prefix) --}}
{{-- @dd($prefix) --}}
 
 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">





<li class="nav-item">
<a href="{{ route('users.view') }}" class="nav-link {{($route == 'users.view')?'active':''}}"><p>View User</p></a>
    
</li>
<li class="nav-item">
<a href="{{ route('profile.view') }}" class="nav-link {{($route == 'profile.view')?'active':''}}"><p>View Profile</p></a>
    
</li>
<!-- Divider -->






<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('category.view') }}" >
        <i class="fas fa-fw fa-cog"></i>
        <span>View Category</span>
    </a>
    
</li>

<hr class="sidebar-divider">
<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('product.view') }}" >
        <i class="fas fa-fw fa-cog"></i>
        <span>View Product</span>
    </a>
    
</li>

<hr class="sidebar-divider">



</ul>
<!-- End of Sidebar -->