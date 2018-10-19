
@if ((count($category->children) > 0) AND ($category->parent_id > 0))
    <li><a class="collapsed nav-link active" href="#{{ $category->id }}" data-toggle="collapse" aria-expanded="false" aria-controls="{{ $category->id }}" id="category-{{ $category->id }}">
            {{ $category->name }}
            <span class="fa float-right"></span>
        </a>

@elseif(count($category->children) > 0)
    <li><a class="collapsed nav-link" href="#{{ $category->id }}" data-toggle="collapse" aria-expanded="false" aria-controls="{{ $category->id }}" id="category-{{ $category->id }}">
            {{ $category->name }}
                <span class="fa float-right"></span>
                </a>

@else
    <li><a class="collapsed nav-link" href="{{ route('getProducts', $category->name) }}" aria-expanded="false" aria-controls="{{ $category->id }}" id="category-{{ $category->id }}">
            {{ $category->name }}
        </a>
@endif

@if (count($category->children) > 0)
    <ul class="collapse list-unstyled fa-ul" data-toggle="collapse" id="{{ $category->id }}" aria-expanded="false">
        @foreach($category->children as $category)

            @include('partials.sideNavigation', $category)

        @endforeach
    </ul>
@endif
</li>



