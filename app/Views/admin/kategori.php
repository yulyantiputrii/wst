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
          <div class="button-add"><a href="/kategoriadmin/add">+ Add Data</a></div>
          <table>
            <tr class="headline">
              <td>No</td>
              <td>Category Name</td>
            <td>Category Parent</td> 
              <td>Description</td>
              <td>Action</td>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($kategori as $kat): ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $kat['nama_kategori']; ?></td>
              <td><?= $kat['induk_kategori']; ?></td>
              <td><?= $kat['deskripsi_kategori']; ?></td>
              <td class="status">
                <abbr title="Edit"
                  ><a href="/kategoriadmin/<?= $kat['id_kategori']; ?>"><img src="/Horizon/Assets/icon/edit.png" alt="" /></a
                ></abbr>
                <abbr title="Delete"
                  ><a href="/kategoriadmin/delete/<?= $kat['id_kategori']; ?>"><img src="/Horizon/Assets/icon/trash.png" alt="" /></a
                ></abbr>
              </td>
            </tr>
            <?php endforeach; ?>
          </table>
        </div>

        <div class="space" style="padding-bottom: 150px;"></div>

<?= $this->endSection(); ?>