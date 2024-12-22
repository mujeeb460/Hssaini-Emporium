<ul>
    <li><a href="/" class="active">Home</a></li>
    <li><a href="{{ Route('shop') }}">Shop</a></li>
    <li><a href="#">Category</a>
        <ul class="header__menu__dropdown">
            @foreach ($categories as $category)
                <li>
                    <a href="{{ Route('shop', ['category', $category->id, $category->slug, $category->thumbnail]) }}">{{ $category->title }}</a>
                    @if ($category->subCategories->isNotEmpty())
                        <ul>
                            @foreach ($category->subCategories as $subCategory)
                                <li>
                                    <a href="{{ Route('shop', ['subCategory', $subCategory->id, $subCategory->slug, $subCategory->thumbnail]) }}">{{ $subCategory->title }}</a>
                                    @if ($subCategory->childCategories->isNotEmpty())
                                        <ul>
                                            @foreach ($subCategory->childCategories as $childCategory)
                                                <li>
                                                    <a href="{{ Route('shop', ['childCategory', $childCategory->id, $childCategory->slug, $childCategory->thumbnail]) }}">{{ $childCategory->title }}</a>
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
    </li>
    <li><a href="{{ Route('contactus') }}" wire:navigate>Contact</a></li>
    <li><a href="{{ Route('myorder') }}"  wire:navigate>My Orders</a></li>
</ul>
