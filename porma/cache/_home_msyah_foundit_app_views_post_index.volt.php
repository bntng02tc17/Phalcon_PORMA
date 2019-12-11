<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
    <?php echo $this->tag->getTitle(); ?>
  
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <link href="css/blog-home.css" rel="stylesheet">

</head>

<body style="padding-top: 70px;">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">FOUNDIT</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/post">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/post/myindex">My Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/post/new">Buat Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/session/end">Log Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page Content -->
  

  <div class="container">
<?= $this->getContent() ?>
        <div class="row">
    
          <!-- Blog Entries Column -->
          <div class="col-md-8">
            <h1 class="my-4">
                <p><strong>                
                </strong></p>
                
              <small>
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Buat Berita Kehilangan
  </button>
  
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
            <?= $this->tag->form(['post/create', 'enctype' => 'multipart/form-data']) ?>
            <fieldset>
                <div class="control-group">
                    <?= $form->label('judul', ['class' => 'control-label']) ?> <small>Contoh : Dompet Hitam BlackBeard</small>
                    <div class="controls">
                        <?= $form->render('judul', ['class' => 'form-control']) ?>
                      
                        <!-- <div class="alert alert-warning" id="email_alert">
                            <strong>Warning!</strong> Please enter your email
                        </div> -->
                    </div>
                </div>
                <br>
                <div class="control-group">
                  <p><?= $form->label('deskripsi', ['class' => 'control-label']) ?> <small>Sertakan lokasi dan waktu kejaidan serta kontak yang dapat dihubungi</small></p>  
                    <div class="controls">
                        <?= $form->render('deskripsi', ['class' => 'form-control']) ?>
                        
                        <!-- <div class="alert alert-warning" id="email_alert">
                            <strong>Warning!</strong> Please enter your email
                        </div> -->
                    </div>
                </div>
                <br>
                <div class="">
                    <?= $form->label('foto', ['class' => 'control-label']) ?> <small>Tipe gambar harus PNG</small>
                    <div class="">
                        <?= $form->render('foto', ['class' => 'form-control']) ?>
                        
                        <!-- <div class="alert alert-warning" id="email_alert">
                            <strong>Warning!</strong> Please enter your email
                        </div> -->
                    </div>
                </div> 
                <br>
                <div class='control-group'>
                    <?= $this->tag->submitButton(['Post', 'class' => 'btn btn-primary']) ?>
                </div>
            
            </fieldset>
          <?= $this->tag->endform() ?>
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
            <hr>
            
            <?= $this->tag->form(['post/search']) ?>
            <h4 class="text-right">Cari Postingan</h4>
            <div class="control-group">
                <!-- <small><?= $searchform->label('judul', ['class' => 'control-label']) ?> </small> -->
                <small>Cari berdasarkan nama barang</small>
              <div class="controls">
                  <?= $form->render('judul', ['class' => 'form-control']) ?>
                
                  <!-- <div class="alert alert-warning" id="email_alert">
                      <strong>Warning!</strong> Please enter your email
                  </div> -->
              </div>
          </div>
          <br>
          <div class="control-group">
              <!-- <small> <?= $searchform->label('deskripsi', ['class' => 'control-label']) ?> </small> -->
              <small>cari berdasarkan deskripsi kejadian</small>
              <div class="controls">
                  <?= $form->render('deskripsi', ['class' => 'form-control']) ?>
                  
                  <!-- <div class="alert alert-warning" id="email_alert">
                      <strong>Warning!</strong> Please enter your email
                  </div> -->
              </div>
          </div>

          <div class="control-group">
              <?= $this->tag->submitButton(['Search', 'class' => 'btn btn-primary']) ?>
          </div>
                <hr>

            <?php foreach ($page->items as $post) { ?>
            <!-- Blog Post -->
            <div class="card mb-4">
              <!-- <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap"> -->
              <div class="card-body">
                <?php if (($post->userid == $auth['id']) || $auth['role'] == 'admin') { ?>
                <a href="<?= $this->url->get('post/delete/' . $post->id) ?>" class="badge badge-danger">Delete</a>
                <a href="<?= $this->url->get('post/edit/' . $post->id) ?>" class="badge badge-warning">Edit</a>
                <?php } ?>
                <h2 class="card-title"><span class="badge badge-secondary"><?= $post->status ?></span> <?= $post->judul ?></h2>
                <p class="card-text"><?= $post->deskripsi ?></p>
                <a href="<?= $this->url->get('post/show/' . $post->id) ?>" class="btn btn-primary">Lebih lanjut &rarr;</a>
              </div>
              <div class="card-footer text-muted">
                Posted on January 1, 2017 by <?= $post->users->email ?>
                
              </div>
            </div>
            <?php } ?>
    
            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                    <li class="page-item">
                      <a class="page-link" href='/post/index?page=<?= $page->before; ?>'>&larr; Older</a>
                    </li>
                    <li class="page-item disabled">
                            <a href="" class="page-link"><?= $page->current ?> of <?= $page->total_pages ?></a>
                            </a>
                          </li>
                    <li class="page-item">
                            <a class="page-link" href='/post/index?page=<?= $page->next; ?>'>&rarr; Next</a>
                          </li>
                   
                  </ul>
    
    
          </div>
    
          <!-- Sidebar Widgets Column -->
          <div class="col-md-4">
    
    
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
                    <abbr title="email_auth"><?= $auth['email'] ?></abbr>
                  </address>
                </div>
              </div>
    
          </div>
    
        </div>
        <!-- /.row -->
    
      </div>
      <!-- /.container -->




  
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; FOUNDIT 2019</p>
    </div>
    <!-- /.container -->
  </footer>
  

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>

</html>
