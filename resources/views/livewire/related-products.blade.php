<div>
    <div class="row">
        @foreach ($relatedProducts as $relatedProduct)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg"
                        data-setbg="{{ asset('storage/uploads/' . $relatedProduct->thumbnail) }}">
                        <ul class="product__item__pic__hover">
                            <li><a href="{{ route('addcart', $relatedProduct->id) }}"><i class="fa fa-heart"></i></a></li>
                            <li><a href="{{ route('addcart', $relatedProduct->id) }}"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="{{ route('addcart', $relatedProduct->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">{{ $relatedProduct->title }}</a></h6>
                        <h5>RS {{ $relatedProduct->price }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
