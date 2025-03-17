<div>
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6" wire:ignore.self>
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                            src="{{ asset('storage/uploads/' . ($color ? $color->color_image : $product->thumbnail)) }}" alt="">
                        </div>
                        <div wire:ignore.self class="product__details__pic__slider owl-carousel">
                            @foreach (json_decode($product->images) as $image)
                                <img wire:ignore.self data-imgbigurl="{{ asset('storage/uploads/' . $image) }}"
                                    src="{{ asset('storage/uploads/' . $image) }}" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $product->title }}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        @if ($product->colors->isNotEmpty())
                            <div class="product_colors mt-4">
                                <h5>Choose a Color:</h5>
                                <div class="color-options d-flex gap-2">
                                    @foreach ($product->colors as $color)
                                        <label class="color-label">
                                            <input type="radio" name="color" wire:model="selectColor" wire:click='changeColor({{ $color->id }})' value="{{ $color->color_name }}" hidden>
                                            <span class="color-name" style="background-color: {{ $color->color_code }};">{{ $color->color_name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($product->storageCapacities->isNotEmpty())
                            <div class="product_capacity mt-4">
                                <h5>Choose {{ $product->storageCapacities->first()->attribute_type }}:</h5>
                                <div class="capacity-options d-flex gap-2">
                                    @foreach ($product->storageCapacities as $capacity)
                                        <label class="capacity-label">
                                            <input type="radio" name="selectCapacity" wire:click='changeCapacity({{ $capacity->id }})' value="{{ $capacity->capacity }}" hidden>
                                            <span class="capacity-name">{{ $capacity->attribute_detail }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="product__details__price">
                            RS {{ $price }}
                            <input type="hidden" wire:model="price">

                            @if ($product->mrp)
                                <p style="vertical-align: middle; text-decoration: line-through">{{ $product->mrp }}</p>
                            @endif
                        </div>
                        <p>{!! $product->description !!}</p>

                        <form wire:submit.prevent="addToCart">
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="number" wire:model.live="qty" min="1" max="{{ $productStock }}">
                                    </div>
                                </div>
                            </div>
                            <button class="btn primary-btn">{{ $isCart? 'UPDATE TO CART':'ADD TO CART' }}</button>
                                                {{-- <a href="#" class="primary-btn">ADD TO CARD</a> --}}
                                                {{-- <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a> --}}
                            @if (session()->has('success'))
                                <div class="alert alert-success mt-2">
                                    {{ session('success') }}
                                </div>
                            @elseif (session()->has('error'))
                                <div class="alert alert-danger mt-2">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </form>

                        <ul>
                            <li><b>Availability</b> <span>{{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}</span>
                            </li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            {{-- <li><b>Weight</b> <span>0.5 kg</span></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>{!! $product->description !!}</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>
                                    <table width="100%">
                                        <tr valign="top">
                                            <th>Product name</th>
                                            <td>{{ $product->title }}</td>
                                        </tr>
                                        <tr valign="top">
                                            <th>Description</th>
                                            <td>{!! $product->description !!}</td>
                                        </tr>
                                    </table>
                                    </p>

                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Reviews</h6>
                                    @if($reviews->count() > 0)
                                        @foreach($reviews as $review)
                                            <div class="review">
                                                <strong>{{ $review->user->first_name ?? 'Guest' }}</strong>
                                                <div class="stars">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <span class="{{ $i <= $review->rating ? 'text-warning' : 'text-muted' }}">★</span>
                                                    @endfor
                                                </div>
                                                <p>{{ $review->comment }}</p>
                                                
                                            </div>
                                            <hr>
                                        @endforeach
                                    @else
                                        <p>No reviews yet.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg"
                                data-setbg="{{ asset('storage/uploads/' . $relatedProduct->thumbnail) }}">
                                <ul class="product__item__pic__hover">
                                   <!--  <li><a href="{{ Route('product', [$relatedProduct->id, $relatedProduct->slug, $relatedProduct->description]) }}"><i
                                                class="fa fa-heart"></i></a></li>
                                    <li><a href="{{ Route('addcart', [$relatedProduct->id, $relatedProduct->slug, $relatedProduct->description]) }}"><i
                                                class="fa fa-retweet"></i></a></li> -->
                                    <li>
                                        <!-- <a href="{{ Route('addcart', [$relatedProduct->id, $relatedProduct->slug, $relatedProduct->description]) }}"><i
                                                class="fa fa-shopping-cart"></i></a> -->

                                        <a class="cart_add" href="javascript:void(0);"
                                          data-id="{{ $relatedProduct->id }}" 
                                          data-size="{{ $relatedProduct->size }}" 
                                          data-color="{{ $relatedProduct->color }}"
                                          data-qty="1">
                                          <i class="fa fa-shopping-cart"></i>
                                      </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="{{ route('product',$product->slug) }}">{{ $relatedProduct->title }}</a></h6>
                                <h5>RS {{ $relatedProduct->price }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

<style>
h5 {
    font-weight: bold;
    margin-bottom: 10px;
}

/* Color section */
.color-options {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

/* Colors section */
.color-label {
    border: 2px solid #ddd;
    border-radius: 5px;
    padding: 8px 12px;
    text-align: center;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.color-label:hover {
    background-color: #f7f7f7;
}

.color-label input:checked + .color-name {
    color: blue;
    font-weight: bold;
}


/* Capacity section */
.capacity-options {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.capacity-label {
    border: 2px solid #ddd;
    border-radius: 5px;
    padding: 8px 12px;
    text-align: center;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.capacity-label:hover {
    background-color: #f7f7f7;
}

.capacity-label input:checked + .capacity-name {
    /* background-color: #333; */
    color: blue;
}
</style>
<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>

<script>

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

    // Listen for the Livewire event to refresh the cart
    Livewire.on('cartUpdated', () => {
        alert('ok');
        // Perform any additional logic if needed
        location.reload(); // Reloads the page to reflect cart changes
    });

    document.addEventListener('livewire:update', () => {
        console.log('Livewire component updated!');
        myCustomFunction();
    });

    function myCustomFunction() {
        alert('Custom function executed!');
    }
</script>