
    <?= $this->extend('user/layout'); ?>

<?= $this->section('header'); ?>
<header>
  <div class="shadow">
  <?= $this->endSection(); ?>

<?= $this->section('content'); ?>

        <!-- headline -->
        <div class="headline">
      <h1>Zona Bogor</h1>
      <h3>Travel and Education</h3>

      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt quia rem id nostrum, debitis at quos enim corrupti facilis, magni ad iusto totam provident non voluptate doloremque sit assumenda voluptatum, consequuntur sed
        deserunt tempora ducimus? Molestiae sit iste dolorem
      </p>

      <div class="btn-headline">
        <a href="#">Jelajahi Wisata Bogor</a>
      </div>
    </div>
  </div>
</header>



<div class="main-lates">
    <div class="" style="height: 10px;"></div>
  <center>
    <h1>Lates Post</h1>
  </center>
  <div class="list-product">
    <div class="list-post">
      <?php foreach($produk as $prod): ?>
      <a href="/deatailtour">
        <div class="card-post">
          <!-- isi -->
          <div class="header-card" style="background-image: url('/Horizon/Assets/img/<?= $prod['sampul']; ?>')">

            <div class="shadow-card">
              <div class="rating">
                <?php 
                $rate = (int)$prod['rata_rating'];
                $rateminus = 5 - $rate;
                // var_dump($rateminus);

                if($rate > 0):  ?>
                    <?php for($i=0; $i< $rate; $i++){ ?>
                      <img src="/Horizon/Assets/icon/rating.png" alt="" />
                    <?php } ?>
                    <?php for($i=0; $i< $rateminus; $i++){ ?>
                      <img src="/Horizon/Assets/icon/ratingg.png" alt="" />
                    <?php } ?>
                    <small style="color: #ffc832; margin-top: -25px;">/<?= $prod['jumlah_rater']; ?></small>
                <?php else: ?>
                  <p style="color: #ffc832; margin-top: -25px;"> Belum ada Rating</p>
                    <!-- </?php for($i=0; $i< 5; $i++){ ?>
                      <img src="/Horizon/Assets/icon/ratingg.png" alt="" />
                    </?php } ?> -->
                    
                <?php endif; ?>
<!--                     
                <img src="/Horizon/Assets/icon/rating.png" alt="" />
                <img src="/Horizon/Assets/icon/rating.png" alt="" />
                <img src="/Horizon/Assets/icon/rating.png" alt="" /> -->
              </div>
              <div class="harga">$<?= $prod['harga']; ?></div>
            </div>
          </div>
          <div class="ket">
            <h2><?= $prod['nama_produk']; ?></h2>
            <hr />
            <b><p></p></b>
            <p><?= substr($prod['deskripsi_produk'], 0, 50); ?></p>
          </div>
        </div>
      </a>
      <?php endforeach; ?>
     
    </div>
  </div>
  <div class="btn-more">
    <a href="#">More</a>
  </div>
</div>

<!-- kategori -->
<div class="ctgr">
    <div class="cc">
        
            <div class="text">
                Kategori 1
            </div>
            <div class="text">
                Kategori 2
            </div>
            <div class="text">
                Kategori 3
            </div>
            <div class="text">
                Kategori 4
            </div>
            <div class="text">
                Kategori 5
            </div>
        
    </div>
</div>


<!-- travel recommendation -->
<div class="travel-recommendation">
  <div class="shadow">
    <center>
      <h1>We provide a travel recommendation system based on reviews.</h1>
    </center>
  </div>
</div>

<?= $this->endSection(); ?>