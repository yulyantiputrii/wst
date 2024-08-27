
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
          </table>
          <br>
          <div class="btn">
            <div class="a">
              <a href="/profile">
                Ubah
              </a>
            </div>
          </div>
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

      <div class="card" style="font-size: 12px; line-height: 23px;">
        Sebaiknya lakukan pembayaran max <b> 1x 24 jam</b>. Pembayaran dapat dapat dilakukan dengan transfer
        ke : <br> <br>
        <b>BRI : 228601036272506</b>, An Retno Ekayanti <br>
        <b>Shopee Pay : 6289650017574</b>, An Retno Ekayanti <br>
        <b>Dana : 6289650017574</b>, An Retno Ekayanti <br>
        <b>Gopay : 6289650017574</b>, An Retno Ekayanti <br> <br>
        Setelah pembayaran dilakukan, silahkan upload bukti pembayaran di halaman history dan tunggu proses pembayaran seselai. Jika status pembayaran belum berubah selama 1 x 24 jam silahkan hubungi Admin melalui whatsapp pada icon yang berada di pojok kanan bawah. Terimakasih

      </div>

      <div class="pembayaran">
        <div class="pemb">
        
          <!-- cod -->
          <form action="/cart/addtransaksi/<?= $detail_pesanan->id_keranjang ?>" method="POST">
            <input type="hidden" name="id_produk" id="id_produk" value="<?= $detail_pesanan->idproduk ?>" class="">
            <input type="hidden" name="id" id="id" value="<?= user()->id; ?>" class="">
            <input type="hidden" name="item" id="item" value="<?= $detail_pesanan->item ?>" class="">
            <input type="hidden" name="total_biaya" id="total_biaya" value="
                    <?php 
                    $total_biaya = $detail_pesanan->harga * $detail_pesanan->item;
                    echo $total_biaya; ?>">
            <input type="hidden" name="tanggal_tour" id="tanggal_tour" value="<?= $detail_pesanan->tanggal_tour ?>" class="">
           
            <input type="hidden" name="jenis_transaksi" id="jenis_transaksi" value="cod" class="">
            <input type="hidden" name="status_transaksi" id="status_transaksi" value="unpaid" class="">
            <input type="hidden" name="nilai_rating" id="nilai_rating" value="0" class="">
            <input type="hidden" name="komentar" id="komentar" value="hha" class="">
            <button type="submit" id="">COD</button>
          </form>
    
          <!-- Transfer -->
          <form action="/cart/addtransaksi/<?= $detail_pesanan->id_keranjang ?>" method="POST">
            <input type="hidden" name="id_produk" id="id_produk" value="<?= $detail_pesanan->idproduk ?>" class="">
            <input type="hidden" name="id" id="id" value="<?= user()->id; ?>" class="">
            <input type="hidden" name="item" id="item" value="<?= $detail_pesanan->item ?>" class="">
            <input type="hidden" name="total_biaya" id="total_biaya" value="
                    <?php 
                    $total_biaya = $detail_pesanan->harga * $detail_pesanan->item;
                    echo $total_biaya; ?>">
            <input type="hidden" name="tanggal_tour" id="tanggal_tour" value="<?= $detail_pesanan->tanggal_tour ?>" class="">
            <input type="hidden" name="jenis_transaksi" id="jenis_transaksi" value="transfer" class="">
            <input type="hidden" name="status_transaksi" id="status_transaksi" value="unpaid" class="">
            <button type="submit" id="transfer">Transfer</button>
          </form>

        </div>

      </div>
      
    </div>

<?= $this->endSection(); ?>