<ul>
{foreach $scalarValues as $value}
    <li>{$value}{if $iterator->isFirst()} first{elseif $iterator->isLast()} last{/if}</li>
{/foreach}
</ul>

<table>
{foreach $arrayValues as $value}
    <tr>
        <td>{$value['id']}</td>
        <td>{$value['name']}</td>
    </tr>
{/foreach}
</table>


<table>
{foreach $objectValues as $value}
    <tr>
        <td>{$value->id}</td>
        <td>{$value->getName()}</td>
    </tr>
{/foreach}
</table>

<table>
{foreach $combinedValues as $value}
    <tr>
        <td>{$value['id']}</td>
        <td>{$value['name']}</td>
        <td>{$value['object']->id}</td>
        <td>{$value['object']->getName()}</td>
    </tr>
{/foreach}
</table>
