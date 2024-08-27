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
              <td>User</td>
              <td>Product</td>
              <td>Rating</td>
              <td>Review</td>
              <!-- <td>Status</td> -->
              <td style="text-align: center;">Action</td>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($rating as $rat): ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $rat['username']; ?></td>
              <td><?= $rat['nama_produk']; ?></td>
              <td><?= $rat['nilai_rating']; ?></td>
              <td><?= $rat['komentar']; ?></td>
              <!-- <td>Tampil</td> -->
              <td class="status" style="text-align: center;">
                <abbr title="Delete"
                  ><a href="/ratingadmin/delete/<?= $rat['id_rating']; ?>"><img src="/Horizon/Assets/icon/trash.png" alt="" /></a
                ></abbr>
              </td>
            </tr>
            <?php endforeach; ?>
          </table>
          
        </div>

<?= $this->endSection(); ?>