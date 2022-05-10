<ul>
    @foreach ($childs as $child)
        <li>
            @foreach (json_decode($child->category_name, true) as $key => $t)
                @if ($key == LaravelLocalization::GetCurrentLocale())
                    {{ $t }}
                @endif
            @endforeach
            @if (count($child->children))
                @include('customers.partials.cat_tree', ['childs' => $child->children])
            @endif
        </li>
    @endforeach
</ul>

