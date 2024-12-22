<div>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="/"><img src="{{ asset('frontend/img/logo.png') }}" alt=""></a>
        </div>

        @livewire('cart')

        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="{{ asset('frontend/img/language.png') }}" alt="">
                <div>English</div>
                {{-- <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul> --}}
            </div>
            <div class="header__top__right__language">
                @auth
                <i class="fa fa-user"></i>
                <div>{{ auth()->user()->first_name }}</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="{{ route('customer.profile.index') }}">Profile</a></li>
                    <li><a href="{{ route('customer.change_password') }}">Setting</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
                @else
                    <a href="{{ route('login') }}" style="color: black"><i class="fa fa-user"></i> Login</a>
                @endauth
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <x-nav-menu />

        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="https://www.facebook.com/profile.php?id=61552649396438&mibextid=LQQJ4d"><i
                    class="fa fa-facebook"></i></a>
            <a href="https://instagram.com/arskincare.pk?igshid=OGQ5ZDc2ODk2ZA=="><i class="fa fa-instagram"
                    aria-hidden="true"></i></a>
            <a href="https://wa.me/923336857367"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
            <a href="https://www.tiktok.com/@ar.skincare?_t=8hSxynKwcB0&_r=1">
                <svg xmlns="http://www.w3.org/2000/svg" width="12.25" height="14" viewBox="0 0 448 512">
                    <path fill="black"
                        d="M448 209.91a210.06 210.06 0 0 1-122.77-39.25v178.72A162.55 162.55 0 1 1 185 188.31v89.89a74.62 74.62 0 1 0 52.23 71.18V0h88a121.18 121.18 0 0 0 1.86 22.17A122.18 122.18 0 0 0 381 102.39a121.43 121.43 0 0 0 67 20.14Z" />
                </svg>
            </a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i>info@hussainiemporium.pk</li>
                <li>Shipping all over pakistan</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> info@hussainiemporium.pk</li>
                                <li>Shipping all over pakistan</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            
                            <div class="header__top__right__language">
                                <img src="{{ asset('frontend/img/language.png') }}" alt="">
                                <div>English</div>
                                {{-- <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul> --}}
                            </div>
                            <div class="header__top__right__language">
                                @auth
                                <i class="fa fa-user"></i>
                                <div>{{ auth()->user()->first_name }}</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="{{ route('customer.profile.index') }}">Profile</a></li>
                                    <li><a href="{{ route('customer.change_password') }}">Setting</a></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" style="background: none; border: none; color: white; cursor: pointer;">logout</button>
                                        </form>
                                    </li>
                                </ul>
                                @else
                                    <a href="{{ route('login') }}" style="color: black"><i class="fa fa-user"></i> Login</a>
                                @endauth
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo text-center">
                        <a href="/"><img src="{{ asset('frontend/img/logo.png') }}" alt="" width="70%"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <x-nav-menu />
                    </nav>
                </div>
                <div class="col-lg-3">
                    <x-cart />
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

</div>
