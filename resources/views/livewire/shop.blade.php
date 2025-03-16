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
                            <!-- <li><a wire:click="$set('selectedType', null)" href="javascript:void(0)">All</a></li> -->
                            @foreach ($categories as $category)
                                <li class="category-item">
                                    <a wire:click="setFilter('category', {{ $category->id }})" href="javascript:void(0)" class="category-toggle">
                                        {{ $category->title }}
                                    </a>

                                    @if($category->subCategories)
                                    <ul class="subcategories-list">
                                        @foreach ($category->subCategories as $subcategory)
                                        <li class="subcategory-item">
                                            <a wire:click="setFilter('subCategory', {{ $subcategory->id }})" href="javascript:void(0)" class="subcategory-toggle">
                                                {{ $subcategory->title }}
                                            </a>

                                            @if($subcategory->childCategories)
                                            <ul class="childcategories-list">
                                                @foreach ($subcategory->childCategories as $childcategory)
                                                <li>
                                                    <a wire:click="setFilter('childCategory', {{ $childcategory->id }})" href="javascript:void(0)">
                                                        {{ $childcategory->title }}
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>

                        <div class="sidebar__item" wire:ignore>
                            <h4>Price</h4>
                            <div class="slider-container">
                                <div class="range-track"></div>
                                <div class="range-progress" id="range-progress"></div>
                                <input type="range" name="min" id="minRange" wire:model="selectedPrice.min" min="{{ $data['price']['min'] }}" max="{{ $data['price']['max'] }}">
                                <input type="range" name="max" id="maxRange" wire:model="selectedPrice.max" min="{{ $data['price']['min'] }}" max="{{ $data['price']['max'] }}">
                              </div>
                              <div class="mt-5">
                                <label for="minRange" class="form-label">Min: <span id="minValue">{{ $selectedPrice['min'] }}</span></label>
                                <label for="maxRange" class="form-label ms-4">Max: <span id="maxValue">{{ $selectedPrice['max'] }}</span></label>
                              </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                @foreach ($latestProducts as $product)
                                    <a href="{{ route('product', [$product->slug]) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('storage/uploads/' . $product->thumbnail) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $product->title }}</h6>
                                            <span>RS {{ $product->price }}</span>
                                            @if($product->mrp)
                                                <h6 style="vertical-align: middle; text-decoration: line-through">RS {{ $product->mrp }}</h6>
                                            @endif
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
    <!-- Product Section End -->
</div>
<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>

<script>

    const minRange = document.getElementById('minRange');
    const maxRange = document.getElementById('maxRange');
    const rangeProgress = document.getElementById('range-progress');
    const minValueDisplay = document.getElementById('minValue');
    const maxValueDisplay = document.getElementById('maxValue');

    function updateRange() {
      const min = parseInt(minRange.value);
      const max = parseInt(maxRange.value);

      // Ensure min doesn't exceed max
      if (min > max - 1) {
        minRange.value = max - 1;
      }
      // Ensure max doesn't go below min
      if (max < min + 1) {
        maxRange.value = min + 1;
      }

      // Update the range progress bar
      const minPercent = (minRange.value / minRange.max) * 100;
      const maxPercent = (maxRange.value / maxRange.max) * 100;

      rangeProgress.style.left = `${minPercent}%`;
      rangeProgress.style.width = `${maxPercent - minPercent}%`;

      // Update displayed values
      minValueDisplay.textContent = minRange.value;
      maxValueDisplay.textContent = maxRange.value;
    }

    // Initialize range
    updateRange();

    // Add event listeners
    minRange.addEventListener('input', updateRange);
    maxRange.addEventListener('input', updateRange);

    $(document).ready(function() {
    $(".category-toggle").click(function(e) {
        e.preventDefault();
        $(this).siblings(".subcategories-list").slideToggle();
    });

    $(".subcategory-toggle").click(function(e) {
        e.preventDefault();
        $(this).siblings(".childcategories-list").slideToggle();
    });
});


        $(document).ready(function () {
            $(".cart_add").click(function (e) {
                e.preventDefault();

                var product_id = $(this).data("id");
                var size = $(this).data("size");
                var color = $(this).data("color");
                var qty = $(this).data("qty");

                $.ajax({
                    url: "{{ route('cart_add') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        product_id: product_id,
                        size: size,
                        color: color,
                        qty: qty
                    },
                    success: function (response) {
                        // console.log(response);
                        if (response.status === "success") {
                            $('.header__cart').find('a').find('span').html(response.cart_count);

                            $('.header__cart').find('.header__cart__price').find('span').html(response.total_price);
                            
                            $.toast({
                                heading: "Well done!",
                                text: response.message,
                                position: "top-right",
                                loaderBg: "#5ba035",
                                icon: "success",
                                hideAfter: 3e3,
                                stack: 1
                            })
                        } else {
                            $.toast({
                                heading: "Oh snap!",
                                text: response.message,
                                position: "top-right",
                                loaderBg: "#bf441d",
                                icon: "error",
                                hideAfter: 3e3,
                                stack: 1
                            })
                        }
                    },
                    error: function () {
                        alert("Something went wrong! Please try again.");
                    }
                });
            });
        });

  </script>

<style>
    .slider-container {
      position: relative;
      width: 100%;
    }
    .range-track {
      position: absolute;
      height: 5px;
      background-color: #ddd;
      top: 50%;
      left: 0;
      transform: translateY(-50%);
      width: 100%;
    }
    .range-progress {
      position: absolute;
      height: 5px;
      background-color: #7ead39;
      top: 50%;
      transform: translateY(-50%);
    }
    input[type="range"] {
      position: absolute;
      width: 100%;
      height: 0;
      pointer-events: none;
      -webkit-appearance: none;
      appearance: none;
    }
    input[type="range"]::-webkit-slider-thumb {
      pointer-events: auto;
      width: 16px;
      height: 16px;
      background-color: #7ead39;
      border: none;
      border-radius: 50%;
      -webkit-appearance: none;
      appearance: none;
      cursor: pointer;
    }
    input[type="range"]::-moz-range-thumb {
      pointer-events: auto;
      width: 16px;
      height: 16px;
      background-color: #7ead39;
      border: none;
      border-radius: 50%;
      cursor: pointer;
    }

    
    /* Hide subcategories and child categories by default */
    .subcategories-list,
    .childcategories-list {
        display: none;
    }

    /* Hide subcategories and child categories by default */
    .subcategories-list,
    .childcategories-list {
        display: none;
    }


    .category-item:hover > .subcategories-list {
        display: block;
    }


    .subcategory-item:hover > .childcategories-list {
        display: block;
    }

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

</style>