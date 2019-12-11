<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>  <?php echo $this->tag->getTitle(); ?> </title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
  <!-- Custom styles for this template -->
  <link href="css/blog-post.css" rel="stylesheet">

  <style>

    .footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 60px; /* Set the fixed height of the footer here */
      line-height: 60px; /* Vertically center the text there */
      background-color: #f5f5f5;
    }
    </style>

</head>

<body style="padding-top: 70px;">
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
  

<div class="container bg-gradient-primary">
    <?= $this->getContent() ?>

        <div class="row">
            

                <!-- Post Content Column -->
                <div class="col-lg-8">
          
                  <!-- Title -->
                  <a href="<?= $this->url->get('post/delete/' . $post->id) ?>" class="badge badge-danger">Delete</a>
            <a href="<?= $this->url->get('post/edit/' . $post->id) ?>" class="badge badge-warning">Edit</a>
                  <h1 class="mt-4"><?= $post->judul ?></h1>
                  
          
                  <!-- Author -->
                  <p class="lead">
                    by
                    <a href="#"><?= $post->users->email ?></a>
                  </p>
          
                  <hr>
          
                  <!-- Date/Time -->
                  <p><?= $post->created_at ?></p>
          
                  <hr>
          
                  <!-- Preview Image -->
                  <!-- <img class="img-fluid rounded" src="http://placehold.it/900x300" alt=""> -->
                 
                  <hr>
          
                  <!-- Post Content -->
                  <div class="card-body">
                      <p class="card-text"><?= $post->deskripsi ?></p>
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
                              <h5 class="modal-title" id="exampleModalLongTitle"><?= $post->judul ?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <img src="<?= '/img/post/' . $post->namaGambar ?>" alt="..." class="img-thumbnail">
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
                            <?= $this->tag->form(['comment/create/' . $post->id]) ?>
                            <fieldset>
                                    <div class="control-group">
                                           
                                            <div class="controls">
                                                <?= $form->render('komentar', ['class' => 'form-control', 'rows' => '3']) ?>
                                            
                                            </div>
                                        </div>
                                        <br>
                                <div class='control-group'>
                                    <?= $this->tag->submitButton(['Comment', 'class' => 'btn btn-primary']) ?>
                                </div>
                            </fieldset>
                            <?= $this->tag->endform() ?>
                    </div>
                  </div>
          
                  <!-- Single Comment -->
                  <?php foreach ($comments as $comment) { ?>
                      <div class="card">
                          <div class="card-header">
                              <?= $comment->c->created_at ?>
                              <?php if (($comment->c->userid == $auth['id']) || $auth['role'] == 'admin') { ?>
                              <a href="<?= $this->url->get('comment/delete/' . $comment->c->id) ?>" class="badge badge-danger">Delete</a>
                              <a href="<?= $this->url->get('comment/edit/' . $comment->c->id) ?>" class="badge badge-warning">Edit</a>
                            <?php } ?>
                          </div>
                          <div class="card-body">
                            <blockquote class="blockquote mb-0">
                              <p><?= $comment->c->komentar ?>.</p>
                              <footer class="blockquote-footer"><cite title="Source Title"><?= $comment->b->email ?></cite></footer>
                            </blockquote>
                          </div>
                        </div>
                        <br>
                  
                <?php } ?>
          
          
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
