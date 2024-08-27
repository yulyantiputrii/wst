
    <?= $this->extend('user/layout'); ?>

<?= $this->section('header'); ?>
    <header style="height: 350px">
        <div class="shadow" style="height: 350px">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="title-tour">
<div class="title-tour">
    
          <h1><?= $title; ?></h1>
        </div>
      </div>
    </header>
    <div class="main-cart">

        <div class="card">
          <h3>Billing Details</h3> <br>
          <table>
            <tr>
              <td style="width: 10px;">Name</td>
              <td style="width: 70%;"><?= user()->fullname ?? '<p style="color:red;">Belum diisi</p>'; ?></td>
            </tr>
            <tr>
              <td>Country</td>
              <td><?= user()->country ?? '<p style="color:red;">Belum diisi</p>'; ?></td>
            </tr>
            <tr>
              <td>City</td>
              <td><?= user()->city ?? '<p style="color:red;">Belum diisi</p>'; ?></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><?= user()->email ?? '<p style="color:red;">Belum diisi</p>'; ?></td>
            </tr>
            <tr>
              <td>Birthday</td>
              <td><?= user()->birthday ?? '<p style="color:red;">Belum diisi</p>'; ?></td>
            </tr>
            <tr>
              <td>Phone Number</td>
              <td><?= user()->phone_number ?? '<p style="color:red;">Belum diisi</p>'; ?></td>
            </tr>
            <tr>
            <tr>
                <td>Tanggal Pemesanan</td>
                <td><?= $detail_pesanan->created; ?></td>
            </tr>
            <tr>
                <td>Tanggal Tour</td>
                <td><?= $detail_pesanan->tanggal_tour; ?></td>
            </tr>            
            <tr>
                <td>Jenis transaksi</td>
                <td><?= $detail_pesanan->jenis_transaksi; ?></td>
            </tr>
            <tr height="100px">
                <td>Bukti Pembayaran</td>
                <td>
                    <?php if($detail_pesanan->jenis_transaksi== "cod"): ?>
                            Tidak ada bukti transaksi berupa media, <br> pembayaran dilakukan lansung di lokasi
                    <?php elseif($detail_pesanan->jenis_transaksi== "transfer"): ?>
                        <?php if($detail_pesanan->bukti_transaksi == null): ?>
                            Belum ada bukti transaksi
                        <?php else: ?>
                            <a href="/Horizon/Assets/img/buktitf/<?= $detail_pesanan->bukti_transaksi; ?>">
                                <img src="/Horizon/Assets/img/buktitf/<?= $detail_pesanan->bukti_transaksi; ?>" style="width: 100px;" alt="">
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>Status Transaksi</td>
                <td><?= $detail_pesanan->status_transaksi; ?></td>
            </tr>
            <tr>
                <td>Status Tour</td>
                <td><?= $detail_pesanan->status_tour; ?></td>
            </tr>
          </table>
          <br>
          
          <br>
        </div>
      
      <!-- form cart -->
      <form action="" method="POST">
        <div class="card">
          <h3>Your Order</h3> <br>
          <table>
            <tr class="title">
              <td>Product</td>
              <td>Booking Date</td>
              <td>Price</td>
              <td>Qyt</td>
              <td>Subtotal</td>
              <td></td>
            </tr>
            <tr>
              <td style="display: flex;">
                <div class="image" style="  background-image: url('/Horizon/Assets/img/<?= $detail_pesanan->sampul ?>');"></div>
                <div class="text">
                  <?= $detail_pesanan->nama_produk ?>
                </div>
              </td>
              <td>
                  <?= $detail_pesanan->tanggal_tour ?>
              </td>
              <td>
                  <?= $detail_pesanan->harga ?>
              </td>
              <td>
                  <?= $detail_pesanan->item ?>
              </td>
              <td>
              <?php 
                    $total_biaya = $detail_pesanan->harga * $detail_pesanan->item;
                    echo 'Rp '. $total_biaya;
                  ?>
              </td>
            </tr>
            <tr class="title">
              <td></td>
              <td></td>
              <td></td>
              <td>Cart Total : </td>
              <td><?php 
                    $total_biaya = $detail_pesanan->harga * $detail_pesanan->item;
                    echo 'Rp '. $total_biaya;
                  ?></td>
            </tr>
          </table>
        </div>
      </form>

      
    </div>

<?= $this->endSection(); ?>