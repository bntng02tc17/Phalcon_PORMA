
{% extends 'templates/post.volt' %}

{% block content %}
    <div class="card">
            <div class="card-body">
            <h5 class="card-title">{{post.judul}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{post.created_at}}</h6>
            <p class="card-text">{{post.deskripsi}}</p>
            <img src="{{'/img/post/' ~ post.namaGambar}}" class="rounded float-right" alt="{{post.judul}}">
            <!-- <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a> -->
            </div>
        </div>
        
    {% for comment in rows %}
        <div class="card">
            <div class="card-header">
                STATUS : {{post.status}}
            </div>
            <div class="card-body">
                    <!-- <h5 class="card-title">{{post.judul}}</h5> -->
            <p class="card-text">{{comment.komentar}}</p>
            <p class="card-text">{{comment.email}}</p>
                    <!-- <img src="{{'/img/post/' ~ post.namaGambar}}" class="rounded float-right" alt="{{post.judul}}"> -->
                    
                    <!-- {{ link_to('login', image('images/login.png')) }} -->
                    <!-- <a href="{{url('post/show/' ~ post.id)}}" class="btn btn-primary">Detail</a> -->
            </div>
        </div>
    {% endfor %}
    {{ form('comment/create/' ~ post.id) }}
<h2>
    Fill the form to Comment
</h2>

<fieldset>
    {% for element in form %}
        <div class='control-group'>
            {{ element.label(['class': 'control-label']) }}

            <div class='controls'>
                {{ element }}
            </div>
        </div>
    {% endfor %}
    <div class='control-group'>
        {{ submit_button('Comment', 'class': 'btn btn-primary') }}
    </div>
</fieldset>
{{ endForm() }}
{% endblock %}
