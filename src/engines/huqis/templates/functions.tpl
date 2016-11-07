{function sayName($name)}
    Hello {$name}!
{/function}

{foreach $names as $name}
    {sayName($name)}
{/foreach}
