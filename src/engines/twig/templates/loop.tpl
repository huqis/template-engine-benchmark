<ul>
{% for value in scalarValues %}
    <li>{{ value }}</li>
{% endfor %}
</ul>

<table>
{% for value in arrayValues %}
    <tr>
        <td>{{ value.id }}</td>
        <td>{{ value.name }}</td>
    </tr>
{% endfor %}
</table>

<table>
{% for value in objectValues %}
    <tr>
        <td>{{ value.id }}</td>
        <td>{{ value.name }}</td>
    </tr>
{% endfor %}
</table>

<table>
{% for value in combinedValues %}
    <tr>
        <td>{{ value.id }}</td>
        <td>{{ value.name }}</td>
        <td>{{ value.object.id }}</td>
        <td>{{ value.object.name }}</td>
    </tr>
{% endfor %}
</table>
