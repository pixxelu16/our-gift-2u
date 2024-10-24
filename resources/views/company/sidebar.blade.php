<div class="my-account-side-bar">
    <ul>
        <li class="{{ Request::is('company/my-account') ? 'active' : '' }}">
            <a href="{{ url('/company/my-account') }}">
                <img src="{{ url('public/images/dashboard.svg') }}" />Dashboard
            </a>
        </li>
        <li class="{{ Request::is('company/my-corporate-gift-cards') ? 'active' : '' }}">
            <a href="{{ url('/company/my-corporate-gift-cards') }}">
                <img src="{{ url('public/images/dashboard.svg') }}" />My Gift Cards
            </a>
        </li>
        @if(Auth::user()->is_user_payble == "No")
            <li class="{{ Request::is('company/management-gift-cards') ? 'active' : '' }}">
                <a href="{{ url('/company/management-gift-cards') }}">
                    <img src="{{ url('public/images/dashboard.svg') }}" />Purchase Gift Cards
                </a>
            </li>
        @else 
            <li class="{{ Request::is('company/corporate-gift-cards') ? 'active' : '' }}">
                <a href="{{ url('/company/corporate-gift-cards') }}">
                    <img src="{{ url('public/images/dashboard.svg') }}" />Purchase Gift Cards
                </a>
            </li>
        @endif
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