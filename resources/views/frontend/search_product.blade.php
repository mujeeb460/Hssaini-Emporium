@extends('layouts.frontend')
@section('title', 'Shop')
@section('content')

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

.hero__categories ul {
    display: none; /* Hide by default */
}

.hero__categories.active ul {
    display: block; /* Show when active */
}

.detail_color a {
    color: white;
}

    .suggestions-box {
        position: absolute;
        background: #fff;
        border: 1px solid #ccc;
        width: 100%;
        z-index: 1000;
        display: none;
    }
    .suggestion-item {
        padding: 10px;
        cursor: pointer;
        border-bottom: 1px solid #eee;
    }
    .suggestion-item:hover {
        background-color: #f8f9fa;
    }

</style>

<section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-7">
                    <div class="filter__item">
                        <div class="filter__found">
                            <h6><span>{{ $data['product']['total'] }}</span> Products found</h6>
                        </div>
                    </div>
                    <div class="row featured__filter">
                    @foreach ($products as $product)
                    <div class="col-6 col-md-3  mb-5">
                        <div class="products" style="height: 430px;">
                            <img src="{{ asset('storage/uploads/' . $product->thumbnail) }}" class="img-fluid" alt="{{ $product->title }}" style="height: 220px; margin-bottom: 10px;">
                            <h6 style="font-weight: bold;">{{ $product->category->title }}</h6>
                            <h5>{{ $product->title }}</h5>
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
            </div>
        </div>
    </section>

   
@endsection
