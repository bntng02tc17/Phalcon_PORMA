
{% extends 'templates/base2.volt' %}

{% block content %}
<div style="height: 600px;;background-image: url('https://i.pinimg.com/originals/1a/5a/b6/1a5ab640c5df23a5176c7136d7f21800.jpg');">
<div class="container" style="max-width: 500px;">
    <br><br><br>
    <div class="container-md bg-light text-dark rounded" style="background-color: #e9ebee">
    <h3 align="center" ">LAMAN MASUK</h3>
    <p align="center" ">(Silakan Masuk menggunakan akun <span class="font-weight-bold">FOUNDIT</span>)</p>
    </div>
    <hr>
    {{ form('session/start') }}
        <div class="container-md rounded p-3 mb-2 bg-light text-dark">
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
                <div class="form-actions" align="center">
                    {{ submit_button('Masuk', 'class': 'btn btn-md btn-success') }}
                    
                </div>
            </fieldset>
            <a href="/signup">Belum punya akun?</a>
        </div>
    {{ endForm() }}
    <hr>
    <br><br>
</div>
</div>
{% endblock %}