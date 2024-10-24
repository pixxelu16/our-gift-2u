<div class="my-account-side-bar">
    <ul>
        <li class="{{ Request::is('customer/my-account') ? 'active' : '' }}">
            <a href="{{ url('/customer/my-account') }}">
                <img src="{{ url('public/images/dashboard.svg') }}" />Dashboard
            </a>
        </li>
        <li class="{{ Request::is('customer/my-orders') ? 'active' : '' }}">
            <a href="{{ url('/customer/my-orders') }}">
                <img src="{{ url('public/images/orders.svg') }}" />Orders
            </a>
        </li>
        <li class="{{ Request::is('customer/addresses') ? 'active' : '' }}">
            <a href="{{ url('/customer/addresses') }}">
                <img src="{{ url('public/images/addresses.svg') }}" />Addresses
            </a>
        </li>
        <li class="{{ Request::is('customer/account-details') ? 'active' : '' }}">
            <a href="{{ url('/customer/account-details') }}">
                <img src="{{ url('public/images/account-details.svg') }}" />Account details
            </a>
        </li>
        <li class="{{ Request::is('customer/my-gift-cards') ? 'active' : '' }}">
            <a href="{{ url('/customer/my-gift-cards') }}">
                <img src="{{ url('public/images/my-gifts-cards.svg') }}" />My Gift Cards
            </a>
        </li>
        <li class="{{ Request::is('customer/redeem-gift-cards') ? 'active' : '' }}">
            <a href="{{ url('/customer/redeem-gift-cards') }}">
                <img src="{{ url('public/images/redeem-gift-cards.svg') }}" />Redeem Gift Cards
            </a>
        </li>
        <li class="{{ Request::is('customer/refer-to-friends') ? 'active' : '' }}">
            <a href="{{ url('/customer/refer-to-friends') }}">
                <img src="{{ url('public/images/refer-friends.svg') }}" />Refer To Friends
            </a>
        </li> 
        <li class="{{ Request::is('customer/my-wishlist') ? 'active' : '' }}">
            <a href="{{ url('/customer/my-wishlist') }}">
                <img src="{{ url('public/images/my-wishlist.svg') }}" />My Wishlist
            </a>
        </li> 
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <img src="{{ url('public/images/logout.svg') }}" />Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>