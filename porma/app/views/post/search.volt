
{%extends 'templates/index_base.volt'%}

{% block content %}

  <div class="container">
{{ content() }}
        <div class="row">
    
          <!-- Blog Entries Column -->
          <div class="col-md-8">
            <h1 class="my-4">
                <p><strong>                
                </strong></p>
                
              <small>
  

              </small>
            </h1>
            <hr>
            {{ form("post/search") }}
            <h4 class="text-right">Cari Postingan</h4>

                <fieldset>

                  <div class="control-group">
                      
                      <small>Cari berdasarkan nama barang yang ingin dicari</small>
                    <div class="controls">
                        {{ form.render('judul', ['class': 'form-control']) }}
                      
                        <!-- <div class="alert alert-warning" id="email_alert">
                            <strong>Warning!</strong> Please enter your email
                        </div> -->
                    </div>
                </div>
                <br>
                <div class="control-group">
          
                    <small>Cari berdasarkan deskripsi kehilangan</small>
                    <div class="controls">
                        {{ form.render('deskripsi', ['class': 'form-control']) }}
                        
                        <!-- <div class="alert alert-warning" id="email_alert">
                            <strong>Warning!</strong> Please enter your email
                        </div> -->
                    </div>
                </div>

                <div class="control-group">
                    {{ submit_button("Search", "class": "btn btn-primary") }}
                </div>

                </fieldset>
                <hr>

            {% for post in page.items %}
            <!-- Blog Post -->
            <div class="card mb-4">
              <!-- <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap"> -->
              <div class="card-body">
                {% if (post.userid == auth['id']) OR auth['role'] == "admin" %}
                <a href="{{url('post/delete/' ~ post.id)}}" class="badge badge-danger">Delete</a>
                <a href="{{url('post/edit/' ~ post.id)}}" class="badge badge-warning">Edit</a>
                {% endif %}
                <h2 class="card-title"><span class="badge badge-secondary">{{post.status}}</span> {{post.judul}}</h2>
                <p class="card-text">{{post.deskripsi}}</p>
                <a href="{{url('post/show/' ~ post.id)}}" class="btn btn-primary">Lebih lanjut &rarr;</a>
              </div>
              <div class="card-footer text-muted">
                Posted on January 1, 2017 by {{post.users.email}}
                {# <a href="#">Start Bootstrap</a> #}
              </div>
            </div>
            {% endfor %}
    
            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                    <li class="page-item">
                      <a class="page-link" href='/post/index?page=<?= $page->before; ?>'>&larr; Older</a>
                    </li>
                    <li class="page-item disabled">
                            <a href="" class="page-link">{{page.current}} of {{page.total_pages}}</a>
                            </a>
                          </li>
                    <li class="page-item">
                            <a class="page-link" href='/post/index?page=<?= $page->next; ?>'>&rarr; Next</a>
                          </li>
                   
                  </ul>
    
    
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
    #}
    {#
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
        <!-- /.row -->
    
      </div>
      <!-- /.container -->

{% endblock %}

