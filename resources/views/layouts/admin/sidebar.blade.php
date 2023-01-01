<div class="col-2 nav-item">
    <div class="nav-link {{ false ? 'active' : '' }}">
        <a href="{{route('adminorder')}}">My Order</a>
    </div>
    <div class="nav-link {{ false ? 'active' : '' }}">
        <a href="{{route('adminservice')}}">My Services</a>
    </div>
    <div class="nav-link {{ false ? 'active' : '' }}">
        <a href="{{route('adminbarber')}}">Barber</a>
    </div>
    <div class="nav-link">
        <a href="{{ route('logic-logout') }}">Log Out</a>
    </div>
</div>
