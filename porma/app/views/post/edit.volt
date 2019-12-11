
{% extends 'templates/show_base.volt' %}


{%block content %}
<div class="container">
    

 <h3>LAMAN EDIT POST BERITA</h3>
 <hr>
 {{content()}}
{{ form('post/save') }}
<div class="container-md p-3 mb-2 bg-light text-dark">
        <fieldset>
            {{form.render('id')}}
          <div class="control-group">
                {{ form.label('judul', ['class': 'control-label']) }}
                <div class="controls">
                    {{ form.render('judul', ['class': 'form-control']) }}
                    <p class="help-block">Contoh : Dompet Hitam BlackBeard</p>
                    <!-- <div class="alert alert-warning" id="email_alert">
                        <strong>Warning!</strong> Please enter your email
                    </div> -->
                </div>
            </div>
            <div class="control-group">
                {{ form.label('deskripsi', ['class': 'control-label']) }}
                <div class="controls">
                    {{ form.render('deskripsi', ['class': 'form-control']) }}
                    <p class="help-block">Sertakan lokasi dan waktu kejadian serta kontak yang dapat dihubungi</p>
                    <!-- <div class="alert alert-warning" id="password_alert">
                        <strong>Warning!</strong> Please provide a valid password
                    </div> -->
                </div>
            </div>
            <div class="control-group">
                {{ form.label('foto', ['class': 'control-label']) }}
                <div class="controls">
                    {{ form.render('foto', ['class': 'form-control']) }}
                    <p class="help-block">Tipe gambar harus PNG</p>
                    <!-- <div class="alert alert-warning" id="password_alert">
                        <strong>Warning!</strong> Please provide a valid password
                    </div> -->
                </div>
            </div>
            <br>
                {{ submit_button('Post', 'class': 'btn btn-primary') }}
                
            </div>
        </fieldset>
        <hr>
    </div>
</fieldset>
{{ endForm() }}
</div>
{% endblock %}
