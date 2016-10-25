<ul>
{foreach $scalarValues as $value loop $loop}
    <li>{$value}{if $loop.first} first{elseif $loop.last} last{/if}</li>
{/foreach}
</ul>

<table>
{foreach $arrayValues as $value}
    <tr>
        <td>{$value.id}</td>
        <td>{$value.name}</td>
    </tr>
{/foreach}
</table>

<table>
{foreach $objectValues as $value}
    <tr>
        <td>{$value.id}</td>
        <td>{$value.name}</td>
    </tr>
{/foreach}
</table>

<table>
{foreach $combinedValues as $value}
    <tr>
        <td>{$value.id}</td>
        <td>{$value.name}</td>
        <td>{$value.object.id}</td>
        <td>{$value.object.name}</td>
    </tr>
    {/foreach}
</table>
