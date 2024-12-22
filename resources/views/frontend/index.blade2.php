<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | {{ env('APP_NAME') }}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/libs/jquery-toast/jquery.toast.min.css') }}" type="text/css" />

    <style>
        a:hover {
            color: black;
            text-decoration: underline !important;
        }
    </style>
</head>

<body>
    <x-header />
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        <x-category-menu />
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                {{-- <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div> --}}
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+92 334 219 1443</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="{{ asset('frontend/img/hero/banner.jpg') }}">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

      <div class="row masonry-style d-none d-md-block" data-masonry='{"percentPosition": false }'
            data-rellax-speed="-3">
                <div class="col-md-6 mb-3 px-2 wow fadeInUp" data-wow-delay=".2s">
                    <a href="#">
                        <div class="detail h-600" style="background-image: url({{ asset('frontend/img/hero/banner.jpg') }});">
                            {{-- <h5>INTRODUCING luxury</h5> --}}
                            {{-- <h2>Luminous Lighting</h2> --}}

                            <div class="btn-go">
                                <img src="{{asset('public/frontend/images/right-arrow.svg')}}">
                            </div>
                        </div>
                    </a>
                </div>
            {{-- <div class="col-md-6 mb-3 px-2 wow fadeInUp" data-wow-delay=".2s">
                <a href="product-listing.html">
                    <div class="detail h-600" style="background-image: url({{asset('public/frontend/images/banner-1.jpg')}});">
                        <h5>INTRODUCING luxury</h5>
                        <h2>Luminous Lighting</h2>

                        <div class="btn-go">
                            <img src="{{asset('public/frontend/images/right-arrow.svg')}}">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-3 px-2 wow fadeInUp" data-wow-delay=".4s">
                <a href="product-listing.html">
                    <div class="detail h-500" style="background-image: url({{asset('public/frontend/images/banner-2.jpg')}});">
                        <h6>curious brands</h6>
                        <h3>Brands<br>You'll Love</h3>
                        <div class="btn-go">
                            <img src="{{asset('public/frontend/images/right-arrow.svg')}}">
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 px-2 wow fadeInUp" data-wow-delay=".5s">
                <a href="product-listing.html">
                    <div class="detail h-500" style="background-image: url({{asset('public/frontend/images/banner-3.jpg')}});">
                        <h6>collections</h6>
                        <h3>Tradition Lamp <br> Collections</h3>
                        <div class="btn-go">
                            <img src="{{asset('public/frontend/images/right-arrow.svg')}}">
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-md-6 px-2 wow fadeInUp" data-wow-delay=".5s">
                <a href="product-listing.html">
                    <div class="detail h-400" style="background-image: url({{asset('public/frontend/images/banner-4.jpg')}});">
                        <h6>new arrivals</h6>
                        <h3>Chairs That<br> Speaks Design</h3>

                        <div class="btn-go">
                            <img src="{{asset('public/frontend/images/right-arrow.svg')}}">
                        </div>
                    </div>
                </a>
            </div> --}}
        </div>

        <div class="row masonry-style d-flex d-md-none" data-rellax-speed="-3">
            <div class="col-md-6 mb-3 px-2 wow fadeIn" data-wow-delay=".2s">
                <a href="#">
                    <div class="detail h-600" style="background-image: url({{asset('public/frontend/images/banner-1.jpg')}});">
                        <h5>INTRODUCING luxury</h5>
                        <h2>Luminous Lighting</h2>
                        <div class="btn-go">
                            <img src="{{asset('public/frontend/images/right-arrow.svg')}}">
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row bannerbot-m masonry-style d-flex d-md-none">
            <div class="col mb-3 px-2 wow fadeIn" data-wow-delay=".4s">
                <a href="#">
                    <div class="detail" style="background-image: url({{asset('public/frontend/images/banner-2.jpg')}});">
                        <h6>curious brands</h6>
                        <h3>Brands<br>You'll Love</h3>

                        <div class="btn-go">
                            <img src="{{asset('public/frontend/images/right-arrow.svg')}}">
                        </div>
                    </div>
                </a>
            </div>

            <div class="col px-2 wow fadeIn" data-wow-delay=".5s">
                <a href="#">
                    <div class="detail" style="background-image: url({{asset('public/frontend/images/banner-3.jpg')}});">
                        <h6>collections</h6>
                        <h3>Tradition Lamp <br> Collections</h3>

                        <div class="btn-go">
                            <img src="{{asset('public/frontend/images/right-arrow.svg')}}">
                        </div>

                    </div>
                </a>
            </div>
            <div class="col px-2 wow fadeIn" data-wow-delay=".5s">
                <a href="#">
                    <div class="detail h-400" style="background-image: url({{asset('public/frontend/images/banner-4.jpg')}});">
                        <h6>new arrivals</h6>
                        <h3>Chairs That<br> Speaks Design</h3>

                        <div class="btn-go">
                            <img src="{{asset('public/frontend/images/right-arrow.svg')}}">
                        </div>
                    </div>
                </a>
            </div>
        </div>

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($categories as $category)
                        <div class="col-lg-3">
                            <div class="categories__item set-bg"
                                data-setbg="{{ asset('storage/uploads/categories/' . $category->thumbnail) }}">
                                <h5><a href="{{ Route('shop', $category->id) }}">{{ $category->title }}</a></h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach ($categories as $category)
                                <li data-filter=".{{ $category->slug }}">{{ $category->title }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $product->category->slug }}">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg"
                                data-setbg="{{ asset('storage/uploads/products/' . $product->thumbnail) }}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="{{ Route('addcart', $product->id) }}"><i class="fa fa-heart"></i></a>
                                    </li>
                                    <li><a href="{{ Route('addcart', $product->id) }}"><i
                                                class="fa fa-retweet"></i></a></li>
                                    <li><a href="{{ Route('addcart', $product->id) }}"><i
                                                class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="#">{{ $product->title }}</a></h6>
                                <h5>RS {{ $product->price }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('frontend/img/banner/banner-1.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('frontend/img/banner/banner-2.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach ($letestProducts->take(3) as $val)
                                    <a href="{{ Route('product', $val->id) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('storage/uploads/products/' . $val->thumbnail) }}"
                                                alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $val->title }}</h6>
                                            <span>RS {{ $val->price }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach ($letestProducts->take(3, 3) as $val)
                                    <a href="{{ Route('product', $val->id) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('storage/uploads/products/' . $val->thumbnail) }}"
                                                alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $val->title }}</h6>
                                            <span>RS {{ $val->price }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach ($topRatedProducts->take(3) as $val)
                                    <a href="{{ Route('product', $val->id) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('storage/uploads/products/' . $val->thumbnail) }}"
                                                alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $val->title }}</h6>
                                            <span>RS {{ $val->price }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach ($topRatedProducts->take(3, 3) as $val)
                                    <a href="{{ Route('product', $val->id) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('storage/uploads/products/' . $val->thumbnail) }}"
                                                alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $val->title }}</h6>
                                            <span>RS {{ $val->price }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach ($reviewProducts->take(3) as $val)
                                    <a href="{{ Route('product', $val->id) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('storage/uploads/products/' . $val->thumbnail) }}"
                                                alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $val->title }}</h6>
                                            <span>RS {{ $val->price }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach ($reviewProducts->take(3, 3) as $val)
                                    <a href="{{ Route('product', $val->id) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('storage/uploads/products/' . $val->thumbnail) }}"
                                                alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $val->title }}</h6>
                                            <span>RS {{ $val->price }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    {{-- <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('frontend/img/blog/blog-1.jpg') }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('frontend/img/blog/blog-2.jpg') }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('frontend/img/blog/blog-3.jpg') }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <x-footer />
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('frontend/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/libs/jquery-toast/jquery.toast.min.js') }}"></script>

    @if ($message = Session::get('success'))
        <script>
            $.toast({
                heading: "Well done!",
                text: "{!! $message !!}",
                position: "top-right",
                loaderBg: "#5ba035",
                icon: "success",
                hideAfter: 3e3,
                stack: 1
            })
        </script>
    @endif

    @if ($message = Session::get('error'))
        <script>
            $.toast({
                heading: "Oh snap!",
                text: "{!! $message !!}",
                position: "top-right",
                loaderBg: "#bf441d",
                icon: "error",
                hideAfter: 3e3,
                stack: 1
            })
        </script>
    @endif

    <?php
    if (count($errors) > 0) :
        $allerrors = '<ul>';
        foreach ($errors->all() as $error) :
            $allerrors .= '<li>' . $error . '</li>';
        endforeach;
        $allerrors .= '</ul>';
    ?>

    <script>
        $.toast({
            heading: "Oh snap!",
            text: "{!! $allerrors !!}",
            position: "top-right",
            loaderBg: "#bf441d",
            icon: "error",
            hideAfter: 3e3,
            stack: 1
        })
    </script>
    <?php endif ?>


</body>

</html>
