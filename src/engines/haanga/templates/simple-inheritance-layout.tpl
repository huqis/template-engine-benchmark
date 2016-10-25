<html>
    <head>
        <title>{{ title }}</title>
    </head>
    <body>
        <h2>An example with {{ title|title|escape }}</h2>
        <b>Table with {{ number|escape}} rows</b>
        {% block table %}{% endblock %}
    </body>
</html>
