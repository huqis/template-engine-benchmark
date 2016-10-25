<html>
    <head>
        <title>{{ title }}</title>
    </head>
    <body>
        <h2>An example with {{ title|title|escape }}</h2>
        <b>Table with {{ number|escape}} rows</b>
        <table>
        {% for row in table %}
            <tr>
                <td>{{ row.id }}</td>
                <td>{{ row.name|escape }}</td>
            </tr>
        {% endfor %}
        </table>
    </body>
</html>
