
    <?= $this->extend('user/layout'); ?>

    <?= $this->section('header'); ?>
    <header>
      <div class="shadow">
      <?= $this->endSection(); ?>

    <?= $this->section('content'); ?>
    
            <!-- headline -->
            <div class="headline">
              <!-- <?= $waktu; ?> -->
          <h1>Zona Bogor</h1>
          

          <p?>
          Selamat datang di Zona Bogor, tempat di mana hijau alam dan kisah pengetahuan berpadu menjadi satu. 
          Di sini, setiap sudut kota hujan mengisahkan petualangan mulai dari rimbun pepohonan hingga lorong-lorong sejarah yang menunggu untuk dijelajahi. 
          </p>
          <p>
          Zona Bogor bukan hanya tentang destinasi, tapi tentang merasakan, mengeksplorasi, dan menemukan harmoni dalam perjalanan Anda. 
          Temukan keajaiban alam dan pengetahuan dalam satu langkah, di tempat di mana alam dan jiwa bertemu.
          </p>

          <div class="btn-headline">
            <a href="/tour">Jelajahi Wisata Bogor</a>
          </div>
        </div>
      </div>
    </header>

    
    <div class="main-lates">
      <center>
        <h1>Wisata Terbaru</h1>
      </center>
      <div class="list-product">
        <div class="list-post">
      
          
          <?php foreach($produk as $prod): ?>
          <a href="/detailtour/<?= $prod['idproduk']; ?>">
            <div class="card-post">
              <!-- isi -->
              <div class="header-card" style="background-image: url('/Horizon/Assets/img/<?= $prod['sampul']; ?>')">
                <div class="shadow-card">
                  <div class="rating">
  
                  </div>
                  <div class="harga">Rp <?= $prod['harga']; ?></div>
                </div>
              </div>
              <div class="ket">
                <h2><?= $prod['nama_produk']; ?></h2>
                <div class="line-post"></div>
                <b><p></p></b>
                <p><?= substr($prod['deskripsi_produk'], 0, 100); ?></p>
              </div>
            </div>
          </a>
          <?php endforeach; ?>
         
    
        </div>
      </div>
      <div class="btn-more">
        <a href="/tour">Lainnya</a>
      </div>
    </div>
    <!-- travel recommendation -->
    <div class="travel-recommendation">
      <div class="shadow">
        <center>
          <h1>Kami juga menyediakan Rekomendasi Wisata Berdasarkan Rating Pengguna.</h1>
          <p style="color: white;">Silahkan Login untuk rekomendasi yang akurat</p>
        </center>
      </div>
      
    </div>

    <!-- <div class="about">
      <div class="pic">
      </div>
      <div class="keterangan"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum facere ipsam blanditiis magnam quia iste! Amet, ratione quia. Maiores quas deleniti amet quae dolor ipsum doloremque, enim ratione laudantium vitae inventore est illum iure culpa impedit quia saepe ullam ad aliquid natus fugit placeat harum! Maxime blanditiis molestiae fugit exercitationem?</div>
    </div> -->

    <!-- hasil collaborative filtering -->
    <?php if ($predictionClass->userIdRated) : ?>
        <?= view('home/formula-recomendation-for-user', ['predictionClass' => $predictionClass]); ?>
    <?php else : ?>
        <?= view('home/formula-recomendation-for-guest', ['predictionClass' => $predictionClass]); ?>
    <?php endif ?>
          
  
      

    <?= $this->endSection(); ?>