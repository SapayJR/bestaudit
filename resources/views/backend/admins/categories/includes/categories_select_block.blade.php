@foreach($categories as $category)
        <option @if($category->parent_id == 0) style="font-weight: bold;"   @endif value="{{ old('parent_id', $category->id ?? "") }}"
    @isset($item->id)
    @if($category->id == $item->parent_id || $category->id == $item->category_id)
            selected
        @endif
        @if($category->id >= $item->id)
            disabled
        @endif
    @endisset
    >
            {{ $delimiter ?? "" }} {{ $category->translation->title ?? "" }} ({{ __('web.' . $category->type->value) }})
    </option>

    @if(count($category->children) > 0)
        @include('backend.admins.categories.includes.categories_select_block',
        [
        'categories' => $category->children->load('children.translation'),
        'delimiter' => ' - ' . $delimiter,
        ])
    @endif
@endforeach
