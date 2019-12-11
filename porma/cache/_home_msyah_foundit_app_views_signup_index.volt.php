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


  
    

    <div class="container">  
    <h3>LAMAN DAFTAR</h3>
    <p>Daftar untuk mendapatkan berbagai fitur dari <span class="font-weight-bold">FOUNDIT</span></p>
    <hr>
    <?= $this->tag->form(['signup/create']) ?>
    <div class="container-md p-3 mb-2 bg-light text-dark">
        <?php if (($this->getContent())) { ?>
            <?= $this->getContent() ?>
        <?php } ?>
        <fieldset>
            <div class="control-group">
                <?= $form->label('email', ['class' => 'control-label']) ?>
                <div class="controls">
                    <?= $form->render('email', ['class' => 'form-control']) ?>
                    <p class="help-block">(required)</p>
                    <!-- <div class="alert alert-warning" id="email_alert">
                        <strong>Warning!</strong> Please enter your email
                    </div> -->
                </div>
            </div>
            <div class="control-group">
                <?= $form->label('password', ['class' => 'control-label']) ?>
                <div class="controls">
                    <?= $form->render('password', ['class' => 'form-control']) ?>
                    <p class="help-block">(minimum 8 characters)</p>
                    <!-- <div class="alert alert-warning" id="password_alert">
                        <strong>Warning!</strong> Please provide a valid password
                    </div> -->
                </div>
            </div>
            <div class="control-group">
                <?= $form->label('repeatPassword', ['class' => 'control-label']) ?>
                <div class="controls">
                    <?= $form->render('repeatPassword', ['class' => 'form-control']) ?>
                    <p class="help-block">(minimum 8 characters)</p>
                    <!-- <div class="alert alert-warning" id="password_alert">
                        <strong>Warning!</strong> Please provide a valid password
                    </div> -->
                </div>
            </div>
            <br>
            <p class="help-block">Dengan mendaftar, Anda menyetujui syarat dan ketentuan yang berlaku.</p>
            <div class="form-actions">
                <?= $this->tag->submitButton(['Daftar', 'class' => 'btn btn-primary']) ?>
                
            </div>
        </fieldset>
        <a href="/session">Sudah punya akun?</a>
        <hr>
    </div>
    <?= $this->tag->endform() ?>
    </div>


  
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
