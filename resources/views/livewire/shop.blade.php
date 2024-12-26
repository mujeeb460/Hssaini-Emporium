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
                                    <a href="{{ route('product', [$product->id, $product->slug, $product->description]) }}" class="latest-product__item">
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
    <!-- Product Section End -->
</div>

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
      background-color: #0d6efd;
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
      background-color: #0d6efd;
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
      background-color: #0d6efd;
      border: none;
      border-radius: 50%;
      cursor: pointer;
    }
  </style>