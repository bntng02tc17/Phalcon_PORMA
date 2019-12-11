{% extends 'templates/base2.volt' %}
{% block header %}
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
{% endblock %}

  {% block content %}
  <!-- Page Content -->
  
  <div class="container">

      {{content()}}

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
  {% endblock %}