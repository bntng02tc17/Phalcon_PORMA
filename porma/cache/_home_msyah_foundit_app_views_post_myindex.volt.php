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
            <a class="nav-link" href="/session/end">Log Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page Content -->
  
<div class="container">
      
        <div class="row">
    
          <!-- Blog Entries Column -->
          <div class="col-md-8">
      
            <?= $this->getContent() ?>
              
            <?php foreach ($posts as $post) { ?>
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
