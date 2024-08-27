<?= $this->extend('user/layout'); ?>

    <?= $this->section('header'); ?>
    <header style="height: 350px">
      <div class="shadow" style="height: 350px">
    <?= $this->endSection(); ?>
    
    <?= $this->section('content'); ?>

    
    <div class="title-tour">
          <h1><?= $title; ?></h1>
        </div>
      </div>
    </header>

    <div class="main-lates">
      <div class="list-product">
        <div class="list-post">
          <?php foreach($produk as $prod): ?>
            <?php if($prod['induk_kategori'] == 'trekking') : ?>
                <a href="/detailtour/<?= $prod['idproduk']; ?>">
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
                            <?php endif; ?>
                        </div>
                        <div class="harga">Rp <?= $prod['harga']; ?></div>
                        </div>
                    </div>
                    <div class="ket">
                        <h2><?= $prod['nama_produk']; ?></h2>
                        <div class="line-post"></div>
                        <b><p></p></b>
                        <p><?= substr($prod['deskripsi_produk'], 0,100); ?></p>
                    </div>
                    </div>
                </a>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <?= $this->endSection(); ?>