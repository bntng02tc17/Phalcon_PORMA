

{% extends 'templates/show_base.volt' %}

{% block content %}

<div class="container bg-gradient-primary">
    {{ content() }}

        <div class="row">
            

                <!-- Post Content Column -->
                <div class="col-lg-8">
          
                  <!-- Title -->
                  <a href="{{url('post/delete/' ~ post.id)}}" class="badge badge-danger">Delete</a>
            <a href="{{url('post/edit/' ~ post.id)}}" class="badge badge-warning">Edit</a>
                  <h1 class="mt-4">{{post.judul}}</h1>
                  
          
                  <!-- Author -->
                  <p class="lead">
                    by
                    <a href="#">{{post.users.email}}</a>
                  </p>
          
                  <hr>
          
                  <!-- Date/Time -->
                  <p>{{post.created_at}}</p>
          
                  <hr>
          
                  <!-- Preview Image -->
                  <!-- <img class="img-fluid rounded" src="http://placehold.it/900x300" alt=""> -->
                 
                  <hr>
          
                  <!-- Post Content -->
                  <div class="card-body">
                      <p class="card-text">{{post.deskripsi}}</p>
                      <hr>
                       <!-- Button trigger modal -->
                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        lihat Gambar
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">{{post.judul}}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <img src="{{'/img/post/' ~ post.namaGambar}}" alt="..." class="img-thumbnail">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  

                  <!-- Modal Picture -->
                  <div>
                    
                  </div>
          
                  <hr>
          
                  <!-- Comments Form -->
                  <div class="card my-4">
                    <h5 class="card-header">Komentar</h5>
                    <div class="card-body">
                            {{ form('comment/create/' ~ post.id) }}
                            <fieldset>
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
                    </div>
                  </div>
          
                  <!-- Single Comment -->
                  {% for comment in comments %}
                      <div class="card">
                          <div class="card-header">
                              {{comment.c.created_at}}
                              {% if (comment.c.userid == auth['id']) OR auth['role'] == "admin" %}
                              <a href="{{url('comment/delete/' ~ comment.c.id)}}" class="badge badge-danger">Delete</a>
                              <a href="{{url('comment/edit/' ~ comment.c.id)}}" class="badge badge-warning">Edit</a>
                            {% endif %}
                          </div>
                          <div class="card-body">
                            <blockquote class="blockquote mb-0">
                              <p>{{comment.c.komentar}}.</p>
                              <footer class="blockquote-footer"><cite title="Source Title">{{comment.b.email}}</cite></footer>
                            </blockquote>
                          </div>
                        </div>
                        <br>
                  
                {% endfor %}
          {#
                  <!-- Comment with nested comments -->
                  <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                      <h5 class="mt-0">Commenter Name</h5>
                      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          
                      <div class="media mt-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                          <h5 class="mt-0">Commenter Name</h5>
                          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                      </div>
          
                      <div class="media mt-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                          <h5 class="mt-0">Commenter Name</h5>
                          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                      </div>
          
                    </div>
                  </div>
                  #}
          
                </div>
          
                <!-- Sidebar Widgets Column -->
                <div class="col-md-4">
          {#
                  <!-- Search Widget -->
                  <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                          <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                      </div>
                    </div>
                  </div>
          
                  <!-- Categories Widget -->
                  <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-6">
                          <ul class="list-unstyled mb-0">
                            <li>
                              <a href="#">Web Design</a>
                            </li>
                            <li>
                              <a href="#">HTML</a>
                            </li>
                            <li>
                              <a href="#">Freebies</a>
                            </li>
                          </ul>
                        </div>
                        <div class="col-lg-6">
                          <ul class="list-unstyled mb-0">
                            <li>
                              <a href="#">JavaScript</a>
                            </li>
                            <li>
                              <a href="#">CSS</a>
                            </li>
                            <li>
                              <a href="#">Tutorials</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  #}
          
                  <!-- Side Widget -->
                  <div class="card my-4">
              <h5 class="card-header">Contact Person Foundit</h5>
              <div class="card-body">
                <address>
                  <abbr title="Phone">P:</abbr>
                  (123) 456-7890
                  <br>
                  <abbr title="Email">E:</abbr>
                  <a href="mailto:#">admin@foundit.com</a>
                </address>
              </div>
            </div>
            <div class="card my-4">
                <h5 class="card-header">Kamu login sebagai</h5>
                <div class="card-body">
                  <address>
                    <abbr title="email_auth">{{auth['email']}}</abbr>
                  </address>
                </div>
              </div>
          
                </div>
          
              </div>


</div>

{% endblock %}
