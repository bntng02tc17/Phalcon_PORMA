{% extends 'templates/base2.volt' %}

{% block content %}
    

    <div class="container">  
    <h3>LAMAN EDIT PROFILE</h3>
    <p>Daftar untuk mendapatkan berbagai fitur dari <span class="font-weight-bold">PORMA</span></p>
    <hr>
    {{ form('profile/save') }}
    <div class="container-md p-3 mb-2 bg-light text-dark">
        {% if(content()) %}
            {{content()}}
        {% endif %}
        <fieldset>
            {% for element in form %}
            {% if element.label === 'id' %} 
            {% continue %}
            {% else %}
            <div class="control-group">
                    {{ element.label(['class': 'control-label']) }}
                    <div class="controls">
                        {{ element.render(['class' : 'form-control']) }}
                        <p class="help-block">(required)</p>
                    </div>
                </div>
                {%endif %}
            {% endfor %}
            




            
            {# Terkomen
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
                {{ form.label('username', ['class': 'control-label']) }}
                <div class="controls">
                    {{ form.render('username', ['class': 'form-control']) }}
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
            <div class="control-group">
                {{ form.label('repeatPassword', ['class': 'control-label']) }}
                <div class="controls">
                    {{ form.render('repeatPassword', ['class': 'form-control']) }}
                    <p class="help-block">(minimum 8 characters)</p>
                    <!-- <div class="alert alert-warning" id="password_alert">
                        <strong>Warning!</strong> Please provide a valid password
                    </div> -->
                </div>
            </div>
        #}
            <br>
            <p class="help-block">Dengan mendaftar, Anda menyetujui syarat dan ketentuan yang berlaku.</p>
            <div class="form-actions">
                {{ submit_button('Daftar', 'class': 'btn btn-primary') }}
                
            </div>
        </fieldset>
        <hr>
    </div>
    {{ endForm() }}
    </div>
{% endblock %}