<?= $this->extend('admin/layout'); ?>

<?= $this->section('content'); ?>


        <div class="title">
          <h2><?= $title; ?></h2><small style="margin-top: 5px;">Last Updated : <?= $produk['updated_at']; ?></small>
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
          <form action="/produkadmin/update/<?= $produk['id_produk']; ?>" method="POST" enctype="multipart/form-data" class="profile-admin" >
            <?= csrf_field(); ?> 
            <div class="in">
            <label for="deskripsi_produk" method="POST" class="">Description</label> <br>
                <textarea name="deskripsi_produk" id="ckeditor" cols="69" rows="50" style="padding: 5px;"><?= $produk['deskripsi_produk']; ?></textarea>
            </div>
            <div class="ident">
              <div class="in">
                <label for="nama_produk" method="POST" class="">Product Name</label>
                <input type="text" name="nama_produk" id="nama_produk" value="<?= $produk['nama_produk']; ?>" class="" required />
              </div>
              <div class="in">
                <label for="id_kategori" method="POST" class="">Category</label><br>
                <select name="id_kategori" id="id_kategori" style="padding: 5px; margin:3px 0 3px; width:100%;" required>
                <?php foreach($kategori as $kat):?>
                  <option value="<?= $kat['id_kategori']; ?>" <?php if($kat['id_kategori'] == $produk['id_kategori']): ?> selected <?php endif; ?>><?= $kat['nama_kategori']; ?></option>
                <?php endforeach; ?>
                </select>
              </div>
              <div class="in">
                <label for="harga" method="POST" class="">Price ($)</label>
                <input type="number" min="0" name="harga" id="harga" value="<?= $produk['harga']; ?>" class="" required />
              </div>
              <div class="in">
                <label for="maps" method="POST" class="">Google Maps Embed Link</label>
                <input type="text" name="maps" id="maps" value="<?= $produk['maps']; ?>" class="" placeholder="Masukkan embed link dari Google Maps" />
              </div>
              <div class="in">
                <label for="sampul" method="POST" class="">Cover</label> <br>
                <div style="
                  height: 200px;
                  background-size: cover;
                  background-position: center;
                  background-image: url('/Horizon/Assets/img/<?= $produk['sampul']; ?>')">
                </div>
                <input type="file" name="sampul" style="margin-left: -5px;" id="sampul" value="" class="" />
              </div>
              <input type="submit" value="Edit Data" name="" id="" />
            </div>
            
          </form>
        </div>

<?= $this->endSection(); ?>