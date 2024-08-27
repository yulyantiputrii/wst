<?= $this->extend('admin/layout'); ?>

<?= $this->section('content'); ?>


        <div class="title">
          <h2><?= $title; ?></h2>
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
        <div class="board">
         
          <table>
            <tr class="headline">
              <td>No</td>
              <td>Produk</td>
              <td>Tanggal Pemesanan</td>
              <td>Total</td>
              <td>Tanggal Tour</td>
              <td style="text-align: center;">Status</td>
              <td style="text-align: center;">Tour</td>
              <td style="text-align: center;">Action</td>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($transaksi as $tr): ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $tr['namaproduk']; ?></td>
              <td><?= $tr['created']; ?></td>
              
              <td ><b>$<?= $tr['total_biaya'];?></b> ( x <?= $tr['item']; ?> Person ) </td>
              
              <td><?= $tr['tanggal_tour']; ?></td>
              <td width="100px">
                <?php if($tr['status_transaksi'] == 'unpaid'): ?>
                    <div style="
                    background-color: #eb3b3b;
                    padding : 3px;
                    border-radius : 30px;
                    text-align: center;
                    color: white;
                    ">
                <?php elseif($tr['status_transaksi'] == 'paid'): ?>
                    <div style="
                    background-color: #51c64e;
                    padding : 3px;
                    border-radius : 30px;
                    text-align: center;
                    color: white;
                    ">
                <?php elseif($tr['status_transaksi'] == 'proses'): ?>
                    <div style="
                    background-color: rgb(255, 174, 0);
                    padding : 3px;
                    border-radius : 30px;
                    text-align: center;
                    color: white;
                    ">
                <?php endif; ?>
                    <?= $tr['status_transaksi']; ?>
                    </div>  
              </td>

              <td>
              <?php if($tr['status_tour'] == 'ongoing'): ?>
                    <div style="
                    background-color: #eb3b3b;
                    padding : 3px;
                    border-radius : 30px;
                    text-align: center;
                    color: white;
                    ">
                <?php elseif($tr['status_tour'] == 'finished'): ?>
                    <div style="
                    background-color: #51c64e;
                    padding : 3px;
                    border-radius : 30px;
                    text-align: center;
                    color: white;
                    ">
                <?php endif; ?>
                    <?= $tr['status_tour']; ?>
                    </div>  
              </td>

              
              <td class="status" style="text-align: center;">
              <!-- <abbr title="Lihat Data"
                  ><a href="/transaksiadmin/view/<?= $tr['id_transaksi']; ?>"><img src="/Horizon/Assets/icon/view.png" alt="" /></a
                ></abbr> -->
              <abbr title="Lihat dan Edit"
                  ><a href="/transaksiadmin/view/<?= $tr['id_transaksi']; ?>"><img src="/Horizon/Assets/icon/edit.png" alt="" /></a
                ></abbr>
              </td>
            </tr>
            <?php endforeach; ?>
          </table>
        </div>

        <div class="space" style="padding-bottom: 200px;"></div>
        

<?= $this->endSection(); ?>