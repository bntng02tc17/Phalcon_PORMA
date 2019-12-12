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
          <a class="navbar-brand" href="#">PORMA</a>
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
            <div class="card">
                    <a href="<?= $this->url->get('profile/edit/' . $user->id) ?>" class="badge badge-warning">Edit</a>
                    <div class="card-header">
                      <?= $user->username ?>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><?= $user->nik ?></li>
                      <li class="list-group-item"><?= $user->nama ?></li>
                      <li class="list-group-item"><?= $user->tempat_lahir ?> / <?= $user->tanggal_lahir ?></li>
                    </ul>
                  </div>
        
    </div>
    <hr>


  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; PORMA 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>
