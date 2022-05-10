@foreach ($subcategories as $subcategory)
    @if (property_exists(json_decode($subcategory->category_name), $locale))
        { <option label="{{ json_decode($subcategory->category_name)->$locale }} ">
            {{ $subcategory->id }}</option>
    @endif
    @if ($subcategory->children)
        @include(
            'admin.categories.partials.subcategories_for_select',
            ['subcategories' => $subcategory->children]
        )
    @endif
@endforeach
