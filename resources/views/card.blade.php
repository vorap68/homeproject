<li class="nav-item ">
    <a class="nav-link dropdown-item" href="{{ route('category', $category_child) }}" role="button">
        {{ $delimeter }} {{ $category_child->name }}
    </a>
    @if ($category_child->childrenCategories)
        <ul style=" list-style-type:  none;">
            @foreach ($category_child->childrenCategories as $child)
                @include('card', ['category_child' => $child, 'delimeter' => '-' . $delimeter])
            @endforeach
        </ul>
    @endif

</li>
