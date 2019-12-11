
{% extends 'templates/base2.volt' %}

{% block content %}
<div class="container">
    <h3>LAMAN MASUK</h3>
    <p>Masuk dengan menggunakan akun <span class="font-weight-bold">FOUNDIT</span></p>
    <hr>
    {{ form('session/start') }}
        <div class="container-md p-3 mb-2 bg-light text-dark">
            {% if(content()) %}
                {{content()}}
            {% endif %}
            <fieldset>
                <div class="control-group">
                    {{ form.label('email', ['class': 'control-label']) }}
                    <div class="controls">
                        {{ form.render('email', ['class': 'form-control']) }}
                        <p class="help-block">(required)</p>
                        <!-- <div class="alert alert-warning" id="email_alert">
                            <strong>Warning!</strong> Please enter your email
                        </div> -->
                    </div>
                </div>
                <div class="control-group">
                    {{ form.label('password', ['class': 'control-label']) }}
                    <div class="controls">
                        {{ form.render('password', ['class': 'form-control']) }}
                        <p class="help-block">(minimum 8 characters)</p>
                        <!-- <div class="alert alert-warning" id="password_alert">
                            <strong>Warning!</strong> Please provide a valid password
                        </div> -->
                    </div>
                </div>
                <br>
                <div class="form-actions">
                    {{ submit_button('Masuk', 'class': 'btn btn-primary') }}
                    
                </div>
            </fieldset>
            <a href="/signup">belum punya akun?</a>
        </div>
    {{ endForm() }}
    <hr>
</div>
{% endblock %}