<?= $this->extend('admin/layout'); ?>

<?= $this->section('content'); ?>


        <div class="title">
          <h2><?= $title; ?></h2><small style="margin-top: 5px;">Last Updated : <?= $transaksi->updated; ?></small>
          <p>Admin / <?= $title; ?></p>
        </div>
        <?php if(!empty(session()->getFlashdata('berhasil'))){ ?>
                <div class="session <?php echo session()->getFlashdata('berhasil');?>">
                    <?php echo session()->getFlashdata('berhasil');?>
                </div>
            <?php } ?>
            <?php if(!empty(session()->getFlashdata('hapus'))){ ?>
                <div class="session <?php echo session()->getFlashdata('hapus');?>">
                    <?php echo session()->getFlashdata('hapus');?>
                </div>
            <?php } ?>
        <div class="board transaksi">
            <h3>Detail Pemesanan</h3>
            <form action="/transaksiupdate/<?= $transaksi->id_transaksi; ?>" method="POST" enctype="multipart/form-data">
                <table style="margin-top: 10px;">
                    <tr>
                    <td style="width: 10px;">Name</td>
                    <td style="width: 70%;"><?= $transaksi->fullname; ?></td>
                    </tr>
                    <tr>
                    <td>Country</td>
                    <td><?= $transaksi->country; ?></td>
                    </tr>
                    <tr>
                    <td>City</td>
                    <td><?= $transaksi->city; ?></td>
                    </tr>
                    <tr>
                    <td>Email</td>
                    <td><?= $transaksi->email; ?></td>
                    </tr>
                    <tr>
                    <td>Birthday</td>
                    <td><?= $transaksi->birthday; ?></td>
                    </tr>
                    <tr>
                    <td>Phone Number</td>
                    <td><?= $transaksi->phone_number; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pemesanan</td>
                        <td><?= $transaksi->created; ?></td>
                    </tr>
                    
                    <tr>
                        <td>Total Harga</td>
                        <td> Rp <?= $transaksi->harga; ?> x <?= $transaksi->item; ?> Person = <b> Rp <?= $transaksi->total_biaya; ?></b></td>
                    </tr>
                    <tr>
                        <td>Jenis Transaksi</td>
                        <td><?= $transaksi->jenis_transaksi; ?></td>
                    </tr>
                    <tr height="100px">
                        <td>Bukti Pembayaran</td>
                        <td>
                            <?php if($transaksi->jenis_transaksi == 'transfer'): ?>
                                <?php if($transaksi->bukti_transaksi == null): ?>
                                    Belum ada bukti transaksi
                                <?php else: ?>
                                <a href="/Horizon/Assets/img/buktitf/<?= $transaksi->bukti_transaksi; ?>">
                                    <img src="/Horizon/Assets/img/buktitf/<?= $transaksi->bukti_transaksi; ?>" style="width: 100px;" alt="">
                                </a>
                                <?php endif; ?>
                            <?php elseif($transaksi->jenis_transaksi == 'cod') :  ?>
                                Tidak ada bukti transaksi berupa media, <br> pembayaran dilakukan lansung di lokasi
                            <?php endif; ?>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>Status Transaksi</td>
                        <td>
                            <?php if($transaksi->jenis_transaksi == 'cod'): ?>
                                <select name="status_transaksi" id="status_transaksi" style="padding: 3px; font-size:12px; width:100%;">
                                        <option value="unpaid" <?php if($transaksi->status_transaksi == 'unpaid'): ?> selected <?php endif; ?>>Unpaid</option>
                                        <option value="paid" <?php if($transaksi->status_transaksi == 'paid'): ?> selected <?php endif; ?>>Paid</option>
                                </select>
                            <?php else: ?>
                                <?php if($transaksi->bukti_transaksi == null): ?>
                                    <?= $transaksi->status_transaksi; ?>
                                <?php elseif($transaksi->bukti_transaksi == !null): ?>
                                    <select name="status_transaksi" id="status_transaksi" style="padding: 3px; font-size:12px; width:100%;">
                                        <option value="proses" <?php if($transaksi->status_transaksi == 'proses'): ?> selected <?php endif; ?>>Proses</option>
                                        <option value="paid" <?php if($transaksi->status_transaksi == 'paid'): ?> selected <?php endif; ?>>Paid</option>
                                    </select>
                                    <?php if($transaksi->status_transaksi == 'proses'): ?>
                                        <small>*ubah status transaksi menjadi <b>paid</b> jika bukti transaksi telah sesuai</small>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Status Tour</td>
                        <td>
                        <select name="status_tour" id="status_tour" style="padding: 3px; font-size:12px; width:100%;">
                            <option value="ongoing" <?php if($transaksi->status_tour == 'ongoing'): ?> selected <?php endif; ?>>Ongoing</option>
                            <option value="finished" <?php if($transaksi->status_tour == 'finished'): ?> selected <?php endif; ?>>Finished</option>
                        </select>
                        <?php if($transaksi->status_tour == 'ongoing'): ?>
                            <small>*ubah status tour menjadi <b>finished</b> jika tour telah terlaksana</small>
                        <?php endif; ?>
                        
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td style="text-align: right;">
                            <button type="submit">Ubah</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <div class="board transaksi">
          <h3>Order</h3> <br>
          <table>
            <tr style="font-weight: 700;">
              <td>Product</td>
              <td>Tanggal Tour</td>
              <td>Price</td>
              <td>Qyt</td>
              <td>Subtotal</td>
              <td></td>
            </tr>
            <tr>
              <td style="display: flex;">
                <div class="image" style="  background-image: url('/Horizon/Assets/img/<?= $transaksi->sampul ?>');"></div>
                <div class="text">
                  <?= $transaksi->namaproduk ?>
                </div>
              </td>
              <td>
                  <?= $transaksi->tanggal_tour ?>
              </td>
              <td>
                  Rp <b> <?= $transaksi->harga ?></b>
              </td>
              <td>
                  <?= $transaksi->item ?>
              </td>
              <td>
                Rp <b> <?= $transaksi->total_biaya; ?> </b>
              </td>
            </tr>
            <tr style="font-weight: 700;">
              <td></td>
              <td></td>
              <td></td>
              <td>Subtotal</td>
              <td>Rp <?= $transaksi->total_biaya; ?></td>
            </tr>
            
          </table>
        </div>
        
       



<?= $this->endSection(); ?>