
{%extends 'templates/index_base.volt'%}

{% block content %}

  <div class="container">
{{ content() }}
        <div class="row">
    
          <!-- Blog Entries Column -->
          <div class="col-md-8">
            <div class="row">
            <div class="col rounded" style="background-color: lightgrey">
            <h1 class="my-4" >
              <br>
                <p style="font-family:Arial, Helvetica, sans-serif">
                  <strong> Anda Kehilangan Sesuatu?          
                  </strong>
                </p>
                <p style="font-size: 50%">
                  Segera buat Berita Kehilangan
                </p>
              
  
              <small>
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Klik di sini!
  </button>
            </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Post Berita Kehilangan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{ form('post/create', 'enctype' : 'multipart/form-data') }}
            <fieldset>
                <div class="control-group">
                    {{ form.label('judul', ['class': 'control-label ']) }} <br><small>Contoh : Dompet Hitam BlackBeard</small>
                    <div class="controls">
                        {{ form.render('judul', ['class': 'form-control']) }}
                      
                        <!-- <div class="alert alert-warning" id="email_alert">
                            <strong>Warning!</strong> Please enter your email
                        </div> -->
                    </div>
                </div>
                <br>
                <div class="control-group">
                  <p>{{ form.label('deskripsi', ['class': 'control-label']) }} <br><small>Sertakan lokasi dan waktu kejaidan serta kontak yang dapat dihubungi</small></p>  
                    <div class="controls">
                        {{ form.render('deskripsi', ['class': 'form-control']) }}
                        
                        <!-- <div class="alert alert-warning" id="email_alert">
                            <strong>Warning!</strong> Please enter your email
                        </div> -->
                    </div>
                </div>
                <br>
                <div class="">
                    {{ form.label('foto', ['class': 'control-label']) }} <small>Tipe gambar harus PNG</small>
                    <div class="">
                        {{ form.render('foto', ['class': 'form-control']) }}
                        
                        <!-- <div class="alert alert-warning" id="email_alert">
                            <strong>Warning!</strong> Please enter your email
                        </div> -->
                    </div>
                </div> 
                <br>
                <div class='control-group' align="center">
                    {{ submit_button('Post', 'class': 'btn btn-success') }}
                </div>
            
            </fieldset>
          {{endForm()}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>
  

              </small>
            </h1>
            <!-- <hr> -->
            <div class="col">
              <br>
            <!--FORM CARI-->
            {{ form("post/search") }}
            <h4 class="text-left">Cari Postingan</h4>
            <div class="control-group">
                <!-- <small>{{ searchform.label('judul', ['class': 'control-label']) }} </small> -->
                <medium>Cari berdasarkan nama barang</medium>
              <div class="controls">
                  {{ form.render('judul', ['class': 'form-control']) }}
                
                  <!-- <div class="alert alert-warning" id="email_alert">
                      <strong>Warning!</strong> Please enter your email
                  </div> -->
              </div>
          </div>
          <br>
          <div class="control-group">
              <!-- <small> {{ searchform.label('deskripsi', ['class': 'control-label']) }} </small> -->
              <medium>Cari berdasarkan deskripsi kejadian</medium>
              <div class="controls">
                  {{ form.render('deskripsi', ['class': 'form-control']) }}
                  
                  <!-- <div class="alert alert-warning" id="email_alert">
                      <strong>Warning!</strong> Please enter your email
                  </div> -->
              </div>
          </div>
          <br>
          <div class="control-group">
              {{ submit_button("Search", "class": "btn btn-primary") }}
          </div>
          <!--FORM CARI-->
        </div>
      </div>

           <!--Buat penutup grid-->
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
                <h2 class="card-title"><span class="badge badge-secondary">{{post.status}}</span><br><br> {{post.judul}}</h2>
                <p class="card-text">{{post.deskripsi}}</p>
                <div align="right">
                <a href="{{url('post/show/' ~ post.id)}}" class="btn btn-primary">Lebih lanjut &rarr;</a>
                </div>
              </div>
              <div class="card-footer text-muted" >
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
                            <a class="page-link" href='/post/index?page=<?= $page->next; ?>'> Next&rarr;</a>
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
            <script src='https://kit.fontawesome.com/a076d05399.js'></script>
            <div class="card my-4">
              <h5 class="card-header">login sebagai</h5>
              <div class="card-body">
                <address>
                  <abbr title="email_auth"><i class="fas fa-user"></i> {{auth['email']}}</abbr>
                </address>
              </div>
            </div>

            <div class="card my-4">
              <h5 class="card-header">Contact Person</h5>
              <div class="card-body">
                <address>
                  <abbr title="Phone"><i class='fas fa-phone'></i></abbr>
                  (123) 456-7890
                  <br>
                  <abbr title="Email"><i class='fas fa-mail-bulk'></i></abbr>
                  <a href="mailto:#">admin@foundit.com</a>
                </address>
              </div>
            </div>

            
          </div>
    
        </div>
        <!-- /.row -->
    
      </div>
      <!-- /.container -->

{% endblock %}

