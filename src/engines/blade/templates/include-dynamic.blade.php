@foreach ($includes as $include)
    @include(str_replace('.tpl', '', $include))
@endforeach
