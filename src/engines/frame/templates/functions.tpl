{macro sayName($name)}
    Hello {$name}!
{/macro}

{foreach $names as $name}
    {sayName($name)}
{/foreach}
