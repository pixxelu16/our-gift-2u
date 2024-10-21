<!-- Sidebar Menu -->
<nav class="mt-2">
   <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item has-treeview {{ Request::is('admin/all-orders') ? 'menu-open' : '' }}">
         <a href="{{ url('admin/all-product-sizes') }}" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
            Orders
               <i class="right fas fa-angle-left"></i>
            </p>
         </a>
         <ul class="nav nav-treeview">
            <li class="nav-item">
               <a href="{{ url('admin/all-orders')}}" class="nav-link {{ Request::is('admin/all-orders') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>All Orders</p>
               </a>
            </li>
            <!--<li class="nav-item">
               <a href="{{ url('admin/all-pre-orders') }}" class="nav-link">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>All Pre Orders</p>
               </a>
            </li>-->
         </ul>
      </li>
      <li class="nav-item has-treeview {{ Request::is('admin/all-products') || Request::is('admin/add-new-product')? 'menu-open' : '' }}">
         <a href="{{url('admin/all-products')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Products
               <i class="right fas fa-angle-left"></i>
            </p>
         </a>
         <ul class="nav nav-treeview">
            <li class="nav-item">
               <a href="{{ url('admin/add-new-product') }}" class="nav-link {{ Request::is('admin/add-new-product') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>Add New Product</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ url('admin/all-products')}}" class="nav-link {{ Request::is('admin/all-products') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>All Products</p>
               </a>
            </li>
         </ul>
      </li>
      <li class="nav-item has-treeview {{ Request::is('admin/all-shipping') || Request::is('admin/add-new-shipping') || Request::is('admin/add-other-setting') ? 'menu-open' : '' }}">
         <a href="{{url('admin/all-shipping')}}" class="nav-link"> 
         <i class="fas fa-shipping-fast nav-icon" aria-hidden="true"></i>
            <p>
              Shipping
               <i class="right fas fa-angle-left"></i>
            </p>
         </a>
         <ul class="nav nav-treeview">
            <li class="nav-item">
               <a href="{{ url('admin/add-new-shipping') }}" class="nav-link {{ Request::is('admin/add-new-shipping') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>Add New Shipping</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ url('admin/all-shipping') }}" class="nav-link {{ Request::is('admin/all-shipping') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>All Shipping</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ url('admin/add-other-setting') }}" class="nav-link {{ Request::is('admin/add-other-setting') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>Other Setting</p>
               </a>
            </li>
         </ul>
      </li>
      <li class="nav-item has-treeview {{ Request::is('admin/all-coupons') || Request::is('admin/add-coupon') ? 'menu-open' : '' }}">
         <a href="{{ url('admin/all-coupons') }}" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
           Coupon Code
               <i class="right fas fa-angle-left"></i>
            </p>
         </a>
         <ul class="nav nav-treeview">
            <li class="nav-item">
               <a href="{{ url('admin/add-coupon') }}" class="nav-link {{ Request::is('admin/add-coupon') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>Add New Coupon</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ url('admin/all-coupons')}}" class="nav-link {{ Request::is('admin/all-coupons') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>All Coupons</p>
               </a>
            </li>
         </ul>
      </li>
      <li class="nav-item has-treeview {{ Request::is('admin/all-categories') || Request::is('admin/add-new-category') ? 'menu-open' : '' }}">
         <a href="{{url('admin/all-categories')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
             Categories
               <i class="right fas fa-angle-left"></i>
            </p>
         </a>
         <ul class="nav nav-treeview">
            <li class="nav-item">
               <a href="{{ url('admin/add-new-category') }}" class="nav-link {{ Request::is('admin/add-new-category') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>Add New Category</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ url('admin/all-categories')}}" class="nav-link {{ Request::is('admin/all-categories') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>All Categories</p>
               </a>
            </li>
         </ul>
      </li>
      <!----page setting--->
      <li class="nav-item has-treeview {{ Request::is('admin/add-term-condition') ? 'menu-open' : '' }}">
         <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
             Page Setting
               <i class="right fas fa-angle-left"></i>
            </p>
         </a>
         <ul class="nav nav-treeview">
            <li class="nav-item">
               <a href="{{ url('admin/manage-page-setting') }}" class="nav-link {{ Request::is('admin/manage-page-setting') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>Upload pdf</p>
               </a>
            </li>
         </ul>
      </li>
      <li class="nav-item has-treeview {{ Request::is('admin/faq') || Request::is('admin/all-faqs') ? 'menu-open' : '' }}">
         <a href="{{url('admin/faq')}}" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
            FAQ
               <i class="right fas fa-angle-left"></i>
            </p>
         </a>
         <ul class="nav nav-treeview">
            <li class="nav-item">
               <a href="{{ url('admin/faq')}}" class="nav-link {{ Request::is('admin/faq') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>Add FAQ</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ url('admin/all-faqs')}}" class="nav-link {{ Request::is('admin/all-faqs') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>All FAQs</p>
               </a>
            </li>
         </ul>
      </li>
      <li class="nav-item has-treeview {{ Request::is('admin/add-new-team-member') || Request::is('admin/all-team-members') ? 'menu-open' : '' }}">
         <a href="{{ url('admin/add-new-team-member') }}" class="nav-link">
           <i class="nav-icon fas fa-comments"></i>
            <p>
            Team
               <i class="right fas fa-angle-left"></i>
            </p>
         </a>
         <ul class="nav nav-treeview">
            <li class="nav-item">
               <a href="{{ url('admin/add-new-team-member') }}" class="nav-link {{ Request::is('admin/add-new-team-member') ? 'active' : '' }}">
               <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>Add Team Member</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ url('admin/all-team-members') }}" class="nav-link {{ Request::is('admin/all-team-members') ? 'active' : '' }}">
               <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>All Team Member</p>
               </a>
            </li>
         </ul>
      </li>
	   <li class="nav-item has-treeview {{ Request::is('admin/all-customers-list') || Request::is('admin/add-new-customer') ? 'menu-open' : '' }}">
         <a href="{{url('admin/all-customers-list')}}" class="nav-link">
           <i class="nav-icon fas fa-users"></i>
            <p>
            Users
               <i class="right fas fa-angle-left"></i>
            </p>
         </a>
         <ul class="nav nav-treeview">
            <li class="nav-item">
               <a href="{{ url('admin/add-new-customer')}}" class="nav-link {{ Request::is('admin/add-new-customer') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>Add New Customer</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ url('admin/all-customers-list')}}" class="nav-link {{ Request::is('admin/all-customers-list') ? 'active' : '' }}">
               <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>All Customers</p>
               </a>
            </li>
         </ul>
      </li>
      <li class="nav-item has-treeview {{ Request::is('admin/all-company-list') || Request::is('admin/all-purchased-gift-cards')? 'menu-open' : '' }}">
         <a href="#" class="nav-link">
           <i class="nav-icon fas fa-users"></i>
            <p>
            Company
               <i class="right fas fa-angle-left"></i>
            </p>
         </a>
         <ul class="nav nav-treeview">
            <li class="nav-item">
               <a href="{{ url('admin/all-company-list')}}" class="nav-link {{ Request::is('admin/all-company-list') ? 'active' : '' }}">
               <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>All Company</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ url('admin/all-purchased-gift-cards')}}" class="nav-link {{ Request::is('admin/all-purchased-gift-cards') ? 'active' : '' }}">
               <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>Purchased Gift Card</p>
               </a>
            </li>
         </ul>
      </li>
      <!--<li class="nav-item has-treeview {{ Request::is('admin/all-membership') || Request::is('admin/add-new-membership') ? 'menu-open' : '' }}">
         <a href="{{url('admin/all-membership')}}" class="nav-link"> 
         <i class="nav-icon far fa-plus-square" aria-hidden="true"></i>
            <p>  
            Memberships
               <i class="right fas fa-angle-left"></i>
            </p>
         </a>
         <ul class="nav nav-treeview">
            <li class="nav-item">
               <a href="{{ url('admin/add-new-membership') }}" class="nav-link {{ Request::is('admin/add-new-membership') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>Add New Membership</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ url('admin/all-membership') }}" class="nav-link {{ Request::is('admin/all-membership') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>All Membership</p>
               </a>
            </li>
         </ul>
      </li>-->
      <li class="nav-item has-treeview {{ Request::is('admin/all-gift-cards') || Request::is('admin/add-new-gift-cards') ? 'menu-open' : '' }}">
         <a href="{{url('admin/all-gift-cards')}}" class="nav-link"> 
         <i class="nav-icon far fa-plus-square" aria-hidden="true"></i>
            <p>  
            Corporate Gift Cards
               <i class="right fas fa-angle-left"></i>
            </p>
         </a>
         <ul class="nav nav-treeview">
            <li class="nav-item">
               <a href="{{ url('admin/add-new-gift-cards') }}" class="nav-link {{ Request::is('admin/add-new-gift-cards') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>Add New Gift Card</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ url('admin/all-gift-cards') }}" class="nav-link {{ Request::is('admin/all-gift-cards') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>All Gift Cards</p>
               </a>
            </li>
         </ul>
      </li>
      <li class="nav-item has-treeview {{ Request::is('admin/all-brand-and-logos') || Request::is('admin/add-new-brand-and-logos') ? 'menu-open' : '' }}">
         <a href="{{url('admin/all-brand-and-logos')}}" class="nav-link"> 
         <i class="nav-icon fas fa-columns" aria-hidden="true"></i>
            <p>  
            Brands & Logos
               <i class="right fas fa-angle-left"></i>
            </p>
         </a>
         <ul class="nav nav-treeview">
            <li class="nav-item">
               <a href="{{ url('admin/add-new-brand-and-logos') }}" class="nav-link {{ Request::is('admin/add-new-brand-and-logos') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>Add New Brand & Logo</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ url('admin/all-brand-and-logos') }}" class="nav-link {{ Request::is('admin/all-brand-and-logos') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                  <p>All Brands & Logos</p>
               </a>
            </li>
         </ul>
      </li>
      <li class="nav-item">
         <a  href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-user"></i>
            <p>
               Logout
            </p>
         </a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
         </form>
      </li>
   </ul>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            var submenu = link.nextElementSibling;

            if (submenu && submenu.classList.contains('nav-treeview')) {
                event.preventDefault();

                // Toggle the current submenu
                toggleSubmenu(link, submenu);

                // Close other submenus
                closeOtherSubmenus(link);
            } else {
                // Ensure parent menu stays open
                keepParentOpen(link);
            }
        });
    });

    function toggleSubmenu(link, submenu) {
        var parent = link.parentElement;

        if (submenu.style.display === 'block') {
            submenu.style.display = 'none';
            parent.classList.remove('menu-open', 'menu-is-opening');
        } else {
            submenu.style.display = 'block';
            parent.classList.add('menu-is-opening');
            setTimeout(function() {
                parent.classList.add('menu-open');
                parent.classList.remove('menu-is-opening');
            }, 300); // Assuming 300 is your animation speed
        }
    }

    function closeOtherSubmenus(activeLink) {
        navLinks.forEach(function (link) {
            if (link !== activeLink && !activeLink.closest('.nav-item').contains(link)) {
                var submenu = link.nextElementSibling;
                if (submenu && submenu.classList.contains('nav-treeview')) {
                    submenu.style.display = 'none';
                    var parent = link.parentElement;
                    parent.classList.remove('menu-open', 'menu-is-opening');
                }
            }
        });
    }

    function keepParentOpen(activeLink) {
        var parent = activeLink.closest('.nav-item');
        if (parent) {
            parent.classList.add('menu-open');
        }
    }
});
</script>


<!-- /.sidebar-menu -->