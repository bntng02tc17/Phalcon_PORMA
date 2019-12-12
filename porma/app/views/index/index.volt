{% extends 'templates/base2.volt' %}
{% block header %}
  <!-- Header -->
  
  <header class="py-5 mb-5" style="background-image: url('https://www.its.ac.id/wp-content/uploads/2019/06/IFl-1-768x340.jpg'); background-size: 100%; background-position: bottom;">
      <div class="container h-100 border border-right-0 border-left-0">
      <div class="row h-10 align-items-center" >
        <div class="col-lg-12 " style="backdrop-filter: blur(2px); height: 350px;" >
          <h1 class="display-4 text-white mt-5 mb-2" align="center"><strong style="font-family:'Times New Roman', Times, serif">"Found What You Lost"</strong></h1>
          <p class="lead mb-5 text-white-25" align="center" style="color: white; ">Membantu mencari barang Anda yang hilang</p>
          <br>
          <div align="center"><a class="btn btn-primary btn-md border border-black" href="/session" style="background-color: #013880">Pelajari lebih lanjut &raquo;</a></div>
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
        <h2>Tentang Kami</h2>
        <hr>
        <p>Bersama Foundit, anda dapat mencari informasi lebih terkait barang Anda yang hilang atau bahkan membantu orang lain yang kehilangan barang.</p>
        
      </div>
      <div class="col-md-4 mb-5 rounded" >
          <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <h4>Kontak kami</h4>
        <hr><div class ="rounded" style="background-color: #DBDBDB">
        <address >
          <strong>Surabaya</strong>
          <br>Jl. Ilmu Komputer no 43
          <br>Perumdos ITS sukolilo
          <br>
        </address>
        <address>
          <abbr title="Phone"><i class='fas fa-phone'></i></abbr>
          (0351) 456-7890
          <br>
          <abbr title="Email"><i class='fas fa-mail-bulk'></i></abbr>
          <a href="mailto:#">admin@foundit.com</a>
        </address></div>
      </div>
    </div>
    <!-- /.row -->
<br><br><br>
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