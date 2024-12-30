@extends('layouts.frontend')
@section('title', 'Shop')
@section('content')

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
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic">
                                        <img src="{{ asset('storage/uploads/' . $product->thumbnail) }}" alt="{{ $product->title }}" class="product-image">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="{{ route('product',$product->slug) }}">
                                                <i class="fa fa-heart"></i></a></li>
                                            <li><a href="{{ route('product',$product->slug) }}">
                                                <i class="fa fa-retweet"></i></a></li>
                                            <li><a href="{{ route('product',$product->slug) }}">
                                                <i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
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
            </div>
        </div>
    </section>

   
@endsection
