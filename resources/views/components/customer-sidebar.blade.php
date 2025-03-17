<style type="text/css">
:root {
  --grey-color: #7f8c8d;
  --primary-color: #3498db;
  --info-color: #2ecc71;
  --success-color: #1abc9c;
  --warning-color: #f1c40f;
  --danger-color: #e74c3c;
}

.customersidebar ul {
  padding: 10px;
  margin: 0;
  list-style-type: none;
}

.customersidebar li {
  padding: 10px;
  margin: 0;
  list-style-type: none;
}


.customersidebar a {
  text-decoration: none;
}

.menu-hover-fill li {
  position: relative;
}

.menu-hover-fill li::before {
  position: absolute;
  content: "";
  top: 0;
  left: -1rem;
  width: 0.25rem;
  height: 100%;
  background: transparent;
  transition: 0.6s;
}

.menu-hover-fill li:nth-child(1)::before {
  background: var(--primary-color);
}

.menu-hover-fill li:nth-child(2)::before {
  background: var(--info-color);
}

.menu-hover-fill li:nth-child(3)::before {
  background: var(--success-color);
}

.menu-hover-fill li:nth-child(4)::before {
  background: var(--warning-color);
}

.menu-hover-fill li:nth-child(5)::before {
  background: var(--danger-color);
}

.menu-hover-fill a {
  position: relative;
  color: var(--grey-color);
  background: linear-gradient(var(--grey-color) 0 100%) left / 0 no-repeat;
  color: transparent;
  background-clip: text;
  -webkit-background-clip: text;
  transition: background-size 0.45s 0.04s;
}

.menu-hover-fill a::before {
  position: absolute;
  content: attr(data-text);
  z-index: -1;
  color: var(--grey-color);
}

.menu-hover-fill li:hover::before {
  left: calc(100% + 1rem);
}

.menu-hover-fill li:hover a {
  background-size: 100%;
}

	
</style>


<div class="col-lg-2 customersidebar">

    <ul class="menu-hover-fill flex flex-col items-start leading-none text-2xl uppercase space-y-4">
  	  <li><a href="{{ route('customer.profile.index' )}}" data-text="My Profile">My Profile</a></li>
  	  <li><a href="{{ route('myorder') }}" data-text="My Orders">My Orders</a></li>
      <li><a href="{{ route('customer.review.index') }}" data-text="My Reviews">My Reviews</a></li>
      <li><a href="{{ route('customer.CancelOrders') }}" data-text="Cancel Orders">Cancel Orders</a></li>
  	  <li><a href="{{ route('customer.myaddress.index') }}" data-text="Address Book">Address Book</a></li>
      <li><a href="{{ route('customer.change_password') }}" data-text="Change Password">Change Password</a></li>
  	  <li>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
          @csrf
          <i class="fa fa-sign-out" aria-hidden="true"></i>
          <button type="submit" style="background: none; border: none; color: #7f8c8d; cursor: pointer;">Logout</button>
        </form>
      </li>
  	</ul>



                                            
                                            
</div>