<html>
    <head>
        <title>{$title}</title>
    </head>
    <body>
        <h2>An example with {$title|capitalize}</h2>
        <b>Table with {$number|escape} rows</b>
        <table>
        {foreach $table $row}
            <tr>
                <td>{$row.id}</td>
                <td>{$row.name|escape}</td>
            </tr>
        {/foreach}
        </table>
    </body>
</html>
