{function sayName n=null}
    Hello {$n}!
{/function}

{foreach $names as $name}
    {call sayName n=$name}
{/foreach}
