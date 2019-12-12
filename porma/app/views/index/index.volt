{% extends 'templates/base2.volt' %}
{% block header %}
  <!-- Header -->
  <header class="bg-primary py-5 mb-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-4 text-white mt-5 mb-2">PORMA</h1>
          <p class="lead mb-5 text-white-50">Cari event kamu di sini!</p>
        </div>
      </div>
    </div>
  </header>
{% endblock %}

  {% block content %}
  <!-- Page Content -->
  
  <div class="container">

      {{content()}}

    <div class="row">
      <div class="col-md-8 mb-5">
        <h2>Yang Kami Lakukan</h2>
        <hr>
        <p>Bersama kami, kamu dapat mengetahui berbagai event anak muda kekinian!</p>
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
          <a href="mailto:#">admin@PORMA.com</a>
        </address>
      </div>
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <!-- <img class="card-img-top" src="http://placehold.it/300x200" alt=""> -->
          <div class="card-body">
            <h4 class="card-title">Posting Event Kekinian</h4>
            <p class="card-text">Di PORMA kamu dapat mempromosikan event yang kamu adain!.</p>
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
            <h4 class="card-title">Cari Event</h4>
            <p class="card-text">kamu bisa menemukan berbagai event di sini!</p>
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
            <p class="card-text">Ada typo di postingan? jangan khawatir. kamu bisa menyunting/menghapus postingamu di sini</p>
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
  {% endblock %}