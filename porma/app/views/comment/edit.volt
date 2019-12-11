
{% extends "templates/show_base.volt" %}

{% block content %}
{{content()}}
{{ form('comment/save') }}
                            <fieldset>
                                {{form.render('id')}}
                                    <div class="control-group">
                                           {#  {{ form.label('komentar', ['class': 'control-label']) }} #}
                                            <div class="controls">
                                                {{ form.render('komentar', ['class': 'form-control', 'rows' : '3']) }}
                                            
                                            </div>
                                        </div>
                                        <br>
                                <div class='control-group'>
                                    {{ submit_button('Comment', 'class': 'btn btn-primary') }}
                                </div>
                            </fieldset>
                            {{ endForm() }}
{% endblock %}


