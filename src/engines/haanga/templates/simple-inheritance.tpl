{% extends "simple-inheritance-layout.tpl" %}

{% block table %}
    <table>
    {% for row in table %}
        <tr>
            <td>{{ row.id }}</td>
            <td>{{ row.name|escape }}</td>
        </tr>
    {% endfor %}
    </table>
{% endblock %}
