<?php $this->load->view('header'); ?>
<div class="hero-wrap js-fullheight">
  <div class="home-slider owl-carousel js-fullheight">
    <div class="slider-item js-fullheight" style="background-image:url(https://awsimages.detik.net.id/community/media/visual/2020/07/01/kapal-cepat-lamborghini-63-tecnomar.jpeg?w=700&q=90);">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center">
          <div class="col-md-7 ftco-animate">
            <div class="text w-100">
              <h2 class="text-white">E - Tiket</h2>
              <h1 class="mb-4 text-white">Reservasi Tiket Online</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center pb-5 mb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <h2>Booking Tiket Sekarang Juga</h2>
      </div>
    </div>
    <div class="row d-flex">
      <?php
      if (!empty($tiket)) {
        foreach ($tiket as $key => $p) {
          echo
          '
          <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <div class="img"><img src="' . base_url('upload/' . $p->gambar) . '" style="border-radius:5%;" alt="/" height="200" width="300"></div>
            <div class="text mt-3">
            <div class="meta mb-2 text-center">
            <div ><a href="#"><b>' . $this->all_model->format_harga($p->harga) . '</b></a></div>
          </div>
              <h3 class="heading text-center"><a href="#">' . $p->nama_tiket . '</a></h3>
              <p class="text-center text-warning"><a href="#">' . $p->nama_kategori . '</a></p>
            </div>
            <br>
            <p class="text-center"><a href="' . base_url('tiket/detail/' . $p->tiket_id) . '" class="btn btn-primary">Beli</a>
          </div>
        </div>
            ';
        }
      } ?>

    </div>
  </div>
</section>
<?php $this->load->view('footer'); ?>