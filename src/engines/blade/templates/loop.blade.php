<ul>
@foreach ($scalarValues as $value)
    @if ($loop->first)
    <li>{{ $value }} first</li>
    @elseif ($loop->last)
    <li>{{ $value }} last</li>
    @else
    <li>{{ $value }}</li>
    @endif
@endforeach
</ul>

<table>
@foreach ($arrayValues as $value)
    <tr>
        <td>{{ $value["id"] }}</td>
        <td>{{ $value["name"] }}</td>
    </tr>
@endforeach
</table>

<table>
@foreach ($objectValues as $value)
    <tr>
        <td>{{ $value->id }}</td>
        <td>{{ $value->getName() }}</td>
    </tr>
@endforeach
</table>

<table>
@foreach ($combinedValues as $value)
    <tr>
        <td>{{ $value["id"] }}</td>
        <td>{{ $value["name"] }}</td>
        <td>{{ $value["object"]->id }}</td>
        <td>{{ $value["object"]->getName() }}</td>
    </tr>
@endforeach
</table>
