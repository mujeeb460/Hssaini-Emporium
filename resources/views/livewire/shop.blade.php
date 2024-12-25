<div>
    <!-- Breadcrumb Section Begin -->
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
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Categories</h4>
                            <ul class="categories-list">
                                <li><a wire:click="$set('selectedType', null)" href="javascript:void(0)">All</a></li>
                                @foreach ($categories as $category)
                                    <li>
                                        <a wire:click="setFilter('category', {{ $category->id }})" href="javascript:void(0)">
                                            {{ $category->title }}
                                        </a>

                                        @if($category->subCategories)
                                        <ul class="subcategories-list">
                                            @foreach ($category->subCategories as $subcategory)
                                            <li>
                                                <a wire:click="setFilter('subCategory', {{ $subcategory->id }})" href="javascript:void(0)">
                                                    {{ $subcategory->title }}
                                                </a>

                                                @if($subcategory->childCategories)
                                                <ul class="childcategories-list">
                                                    @foreach ($subcategory->childCategories as $childcategory)
                                                    <li>
                                                        <a wire:click="setFilter('childCategory', {{ $childcategory->id }})" href="javascript:void(0)">
                                                        {{ $childcategory->title }}
                                                        </a>
                                                    @endforeach
                                                </ul>
                                                @endif

                                            @endforeach
                                        </ul>
                                        @endif 
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="{{ $data['price']['min'] }}" data-max="{{ $data['price']['max'] }}">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount" value="{{ $data['price']['min'] }}">
                                        <input type="text" id="maxamount" value="{{ $data['price']['max'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                @foreach ($latestProducts as $product)
                                    <a href="{{ route('product', [$product->id, $product->slug, $product->description]) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('storage/uploads/' . $product->thumbnail) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $product->title }}</h6>
                                            <span>RS {{ $product->price }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
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
                                            <li><a href="{{ route('product', [$product->id, $product->slug, $product->description]) }}">
                                                <i class="fa fa-heart"></i></a></li>
                                            <li><a href="{{ route('product', [$product->id, $product->slug, $product->description]) }}">
                                                <i class="fa fa-retweet"></i></a></li>
                                            <li><a href="{{ route('product', [$product->id, $product->slug, $product->description]) }}">
                                                <i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="#">{{ $product->title }}</a></h6>
                                        <h5>RS {{ $product->price }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
</div>
