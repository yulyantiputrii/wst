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
          <div class="button-add"><a href="/produkadmin/add">+ Add Data</a></div>
          <table>
            <tr class="headline">
              <td>No</td>
              <td style="width: 20%;">Name</td>
              <td>Category</td>
              <td style="width: 35%;">Description</td>
              <td>Cover</td>
              <td>Price</td>
              <td>Link Gmaps</td>
              <td>Action</td>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($produk as $prod): ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $prod['nama_produk']; ?></td>
              <td><?= $prod['nama_kategori']; ?></td>
              <td><?= substr($prod['deskripsi_produk'], 0, 200); ?></td>
              <td><img src="/Horizon/Assets/img/<?= $prod['sampul']; ?>" width="100px" alt=""></td>
              <td>$ <?= $prod['harga']; ?></td>
              <td><?= $prod['maps']; ?></td>
              <td class="status">
                <abbr title="Edit"
                  ><a href="/produkadmin/edit/<?= $prod['id_produk']; ?>"><img src="/Horizon/Assets/icon/edit.png" alt="" /></a
                ></abbr>
                <abbr title="Delete"
                  ><a href="/produkadmin/delete/<?= $prod['id_produk']; ?>"><img src="/Horizon/Assets/icon/trash.png" alt="" /></a
                ></abbr>
              </td>
            </tr>
            <?php endforeach; ?>
          </table>
        </div>

<?= $this->endSection(); ?>