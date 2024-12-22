<ul>
    @foreach ($categories as $category)
        <li><a href="{{ Route('shop', $category->id) }}">{{ $category->title }}</a></li>
    @endforeach
</ul>
