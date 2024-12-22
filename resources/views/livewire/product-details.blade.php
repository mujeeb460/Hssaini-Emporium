<div>
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
        <div class="product__details__price">RS {{ $product->price }}</div>
        <p>{!! $product->description !!}</p>
        <div>
            <input type="number" min="1" class="form-control w-25 d-inline-block" wire:model="quantity">
            <button class="btn btn-primary ml-2" wire:click="addToCart">Add to Cart</button>
        </div>
        <ul>
            <li><b>Availability</b> <span>{{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}</span></li>
            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
        </ul>
    </div>
</div>
