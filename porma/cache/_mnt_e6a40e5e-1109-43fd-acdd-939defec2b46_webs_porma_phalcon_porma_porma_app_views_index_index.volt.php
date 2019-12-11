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
  <link href="css/business-frontpage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="http://foundit.local/">FOUNDIT</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        
      </div>
    </div>
  </nav>



  <!-- Header -->
  <header class="bg-primary py-5 mb-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-4 text-white mt-5 mb-2">FOUNDIT</h1>
          <p class="lead mb-5 text-white-50">Biarkan kami membantu Anda mencari barang Anda yang hilang</p>
        </div>
      </div>
    </div>
  </header>


  
  <!-- Page Content -->
  
  <div class="container">

      <?= $this->getContent() ?>

    <div class="row">
      <div class="col-md-8 mb-5">
        <h2>Yang Kami Lakukan</h2>
        <hr>
        <p>Bersama kami, Anda dapat mencari informasi lebih terkait barang Anda yang hilang atau bahkan membantu orang lain yang kehilangan barang</p>
        <a class="btn btn-primary btn-lg" href="/session">Pelajari lebih lanjut&raquo;</a>
      </div>
      <div class="col-md-4 mb-5">
        <h2>Hubungi kami</h2>
        <hr>
        <address>
          <strong>Surabaya</strong>
          <br>Jalan Ilmu Pasti Alam
          <br>Perumdos ITS sukolilo
          <br>
        </address>
        <address>
          <abbr title="Phone">P:</abbr>
          (123) 456-7890
          <br>
          <abbr title="Email">E:</abbr>
          <a href="mailto:#">admin@foundit.com</a>
        </address>
      </div>
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <!-- <img class="card-img-top" src="http://placehold.it/300x200" alt=""> -->
          <div class="card-body">
            <h4 class="card-title">Posting Berita Kehilangan</h4>
            <p class="card-text">Di FOUNDIT Anda dapat menyebarkan berita kehilangan kepada netizen.</p>
          </div>
          <div class="card-footer">
            <a href="/session" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <!-- <img class="card-img-top" src="http://placehold.it/300x200" alt=""> -->
          <div class="card-body">
            <h4 class="card-title">Beritahu Pemilik</h4>
            <p class="card-text">Anda dapat memberikan komentar informasi pada postingan berita kehilangan untuk membantu pemilik barang menemukan barangnya.</p>
          </div>
          <div class="card-footer">
            <a href="/session" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <!-- <img class="card-img-top" src="http://placehold.it/300x200" alt=""> -->
          <div class="card-body">
            <h4 class="card-title">Sunting / Hapus</h4>
            <p class="card-text">Barang sudah ditemukan? atau ada typo di penulisan postingan / komentar? Anda bisa sunting atau hapus postingan / komentar anda.</p>
          </div>
          <div class="card-footer">
            <a href="/session" class="btn btn-primary">Find Out More!</a>
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
