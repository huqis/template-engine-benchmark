{define sayName}
    Hello {$n}!
{/define}

{foreach $names as $name}
    {include #sayName n => $name}
{/foreach}
