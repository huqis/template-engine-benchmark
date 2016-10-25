<ul>
{% for value in scalarValues %}
    <li>{{ value }}{% if forLoop.first %} first{% else %}{% if forloop.last %} last{% endif %}{% endif %}</li>
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
        <td>{{ value->getName() }}</td>
    </tr>
{% endfor %}
</table>

<table>
{% for value in combinedValues %}
    {% set object = value.object %}
    <tr>
        <td>{{ value.id }}</td>
        <td>{{ value.name }}</td>
        <td>{{ object.id }}</td>
        <td>{{ object->getName() }}</td>
    </tr>
{% endfor %}
</table>
