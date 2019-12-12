{% extends 'templates/show_base.volt' %}


{% block content %}

    <div class="container">
            <div class="card">
                    <a href="{{url('profile/edit/' ~ user.id)}}" class="badge badge-warning">Edit</a>
                    <div class="card-header">
                      {{user.username}}
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">{{user.nik}}</li>
                      <li class="list-group-item">{{user.nama}}</li>
                      <li class="list-group-item">{{user.tempat_lahir}} / {{user.tanggal_lahir}}</li>
                    </ul>
                  </div>
        
    </div>
    <hr>

{% endblock %}