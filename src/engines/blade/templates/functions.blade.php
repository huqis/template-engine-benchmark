@php
function sayName($name) {
    return 'Hello ' . $name;
}
@endphp

@foreach ($names as $name)
    {{ sayName($name) }}
@endforeach
