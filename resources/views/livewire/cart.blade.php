<div class="header__cart">
    <ul>
        <li>
            <a href="{{ route('cart.index') }}">
                <i class="fa fa-shopping-bag"></i>
                <span>{{ $cartCount }}</span>
            </a>
        </li>
    </ul>
    <div class="header__cart__price">item: <span>RS {{ $totalPrice }}</span></div>
</div>
