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

/* General Styles for Banners */
.detail {
    position: relative;
    background-size: cover;
    background-position: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: white;
    text-align: center;
    overflow: hidden;
    border-radius: 10px;
    transition: transform 0.5s ease, box-shadow 0.5s ease;
}

.detail h5, .detail h2, .detail h6, .detail h3 {
    margin: 5px 0;
    transition: opacity 0.3s ease, transform 0.3s ease;
}

.detail:hover {
    transform: scale(1.1); /* Zoom-in effect */
    box-shadow: 0 20px 30px rgba(0, 0, 0, 0.4); /* Add shadow */
}

/* Overlay Effect */
.detail::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3); /* Dark overlay */
    transition: background 0.5s ease;
}

.detail:hover::before {
    background: rgba(0, 0, 0, 0.6); /* Intensify overlay */
}

/* Shop Now Button */
.detail .btn-shop {
    position: relative;
    display: inline-block;
    margin-top: 15px;
    padding: 10px 20px;
    background: #ff6f61; /* Button background color */
    color: white;
    text-transform: uppercase;
    font-size: 14px;
    font-weight: bold;
    border-radius: 30px;
    text-decoration: none;
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.3s ease, transform 0.3s ease, background 0.3s ease;
}

.detail:hover .btn-shop {
    opacity: 1; /* Button appears */
    transform: translateY(0); /* Moves up smoothly */
}

.detail .btn-shop:hover {
    background: ##343a40; /* Darker hover background for the button */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Add shadow on hover */
}


.detail {
    height: 600px; /* Set a consistent height for all banners */
}

@media (max-width: 768px) {
    .detail {
        height: 300px; /* Adjust for smaller devices */
    }
}


/* Product Card Styling */
.products {
    position: relative;
    text-align: center;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
    padding: 15px;
}

.products img {
    width: 100%;
    border-radius: 8px;
    transition: transform 0.3s ease, opacity 0.3s ease;
}

.products:hover {
    transform: translateY(-10px); /* Lift effect on hover */
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
}

.products:hover img {
    transform: scale(1.1); /* Zoom-in effect */
}

/* Product Text Hover Effect */
.products h6, .products h4, .products p.price {
    transition: color 0.3s ease;
}

.products:hover h6, .products:hover h4, .products:hover p.price {
    color: #007bff; /* Highlight color */
}

/* Shop Now Button Styling */
.products .btn-shop {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 15px;
    background: black;
    color: white;
    font-size: 14px;
    font-weight: bold;
    text-transform: uppercase;
    border-radius: 20px;
    text-decoration: none;
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.3s ease, transform 0.3s ease, background 0.3s ease;
}

.products:hover .btn-shop {
    opacity: 1; /* Button appears */
    transform: translateY(0); /* Moves up smoothly */
}

.products .btn-shop:hover {
    background: ##343a40; /* Darker hover effect for the button */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Add shadow on hover */
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
                            <form action="{{ route('searchProduct') }}" method="post">
                                @csrf
                                {{-- <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div> --}}
                                <input type="text" name="product_slug" placeholder="What do yo u need?">
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
                    
                </div>
            </div>
        </div>
    </section>

    <div class="content pt-4">
    <div class="container">
        <div class="row masonry-style" data-masonry='{"percentPosition": false }'>
            <div class="col-md-6 mb-3">
                <a href="{{ Route('shop', ['category',4,'kitchen-accessories']) }}">
                    <div class="detail h-600" style="background-image: url({{ asset('frontend/joy/images/banner-1.jpg') }});">
                        <h5>INTRODUCING luxury</h5>
                        <h2>Luminous Lighting</h2>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-3">
                <a href="{{ Route('shop') }}">
                    <div class="detail h-500" style="background-image: url({{ asset('frontend/joy/images/banner-2.jpg') }});">
                        <h6>Curious Brands</h6>
                        <h3>Brands You'll Love</h3>
                    </div>
                </a>
            </div>
        </div>
        <div class="row masonry-style" data-masonry='{"percentPosition": false }'>
            <div class="col-md-6 mb-3">
                <a href="{{ Route('shop', ['category',4,'kitchen-accessories']) }}">
                    <div class="detail h-600" style="background-image: url({{ asset('frontend/joy/images/banner-3.jpg') }});">
                        <h5>INTRODUCING luxury</h5>
                        <h2>Luminous Lighting</h2>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-3">
                <a href="{{ Route('shop') }}">
                    <div class="detail h-500" style="background-image: url({{ asset('frontend/joy/images/banner-4.jpg') }});">
                        <h6>Curious Brands</h6>
                        <h3>Brands You'll Love</h3>
                    </div>
                </a>
            </div>
        </div>


        <section class="featured spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Brands</h2>
                        </div>
                    </div>
                </div>
                <div class="row featured__filter">
                    @foreach ($products as $product)
                    <div class="col-6 col-md-3  mb-5">
                        <div class="products">
                            <img src="{{ asset('storage/uploads/' . $product->thumbnail) }}" class="img-fluid" alt="{{ $product->title }}" style="height: 130px">
                            <h6>{{ $product->category->title }}</h6>
                            <h4>{{ $product->title }}</h4>
                            <p class="price">RS {{ $product->price }}</p>
                            @if($product->mrp)
                                <h6 style="vertical-align: middle; text-decoration: line-through">RS {{ $product->mrp }}</h6>
                            @endif
                            <a href="{{ route('product', [$product->slug]) }}" class="btn-shop">Shop Now</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $product->category->slug }}">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg"
                                data-setbg="{{ asset('storage/uploads/' . $product->thumbnail) }}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="{{ Route('addcart', [$product->slug]) }}"><i class="fa fa-heart"></i></a>
                                    </li>
                                    <li><a href="{{ Route('addcart', [$product->slug]) }}"><i
                                                class="fa fa-retweet"></i></a></li>
                                    <li><a href="{{ Route('addcart', [$product->slug]) }}"><i
                                                class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="#">{{ $product->title }}</a></h6>
                                <h5>RS {{ $product->price }}</h5>
                                @if($product->mrp)
                                    <h6 style="vertical-align: middle; text-decoration: line-through">RS {{ $product->mrp }}</h6>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

        <section class="categories">
            <div class="container">
                <div class="row">
                    <div class="categories__slider owl-carousel">
                        @foreach ($categories as $category)
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="{{ asset('storage/uploads/' . $category->thumbnail) }}">
                                <h5><a href="{{ route('shop', [$category->id, $category->slug, $category->thumbnail]) }}">{{ $category->title }}</a></h5>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

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
