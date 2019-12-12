{% extends 'templates/base2.volt' %}

{% block content %}
    
<div class ="row"style="background-color: ">
    <div class="col" style="background-position: center ;background-image: url('http://img.picturequotes.com/2/8/7095/sometimes-you-lose-the-good-things-to-make-room-for-the-great-things-quote-1.jpg')">            
    </div>
    <div class="col" >  
    <h3>LAMAN DAFTAR</h3>
    <p>Daftar untuk mendapatkan berbagai fitur dari <span class="font-weight-bold">FOUNDIT</span></p>
    <hr>
    {{ form('signup/create') }}
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
            <br>
            <p class="help-block" style="font-size: 80%">Dengan mendaftar, Anda Menyetujui Syarat dan Ketentuan yang Berlaku, Kebijakan Data dan Kebijakan Cookie kami. Anda akan menerima Notifikasi Email dan dapat menolaknya kapan saja.</p><br>
            <div class="form-actions">
                {{ submit_button('Daftar', 'class': 'btn btn-md btn-success') }}
                
            </div>
        </fieldset>
        <br><a href="/session">Sudah punya akun?</a>
        <hr>
    </div>
    {{ endForm() }}
    </div>
    
    
</div>
{% endblock %}