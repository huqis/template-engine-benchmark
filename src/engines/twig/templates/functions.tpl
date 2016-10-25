{% macro sayName(name) %}
    Hello {{ name }}!
{% endmacro %}

{% import _self as self %}

{% for name in names %}
    {{ self.sayName(name) }}
{% endfor %}
