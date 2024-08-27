<?= $this->extend('admin/layout'); ?>

<?= $this->section('content'); ?>


        <div class="title">
          <h2><?= $title; ?> <?= $kategori['nama_kategori']; ?></h2>
          <p>Admin / <?= $title; ?></p>
        </div>
        <div class="board">
          <form action="/kategoriadmin/update/<?= $kategori['id_kategori']; ?>" method="POST" class="profile-admin">
            <div class="ident">
              <div class="in">
                <label for="nama_kategori" method="POST" class="">Category Name</label>
                <input type="text" name="nama_kategori" id="nama_kategori" value="<?= $kategori['nama_kategori']; ?>" class="" required />
              </div>
              <div class="in">
                <label for="induk_kategori" method="POST" class="">Category Parent</label>
                <select name="induk_kategori" id="induk_kategori" style="padding: 5px; margin:3px 0 3px; width:100%;" required>
                  <option value="tour" <?php if($kategori['induk_kategori'] == 'tour'): ?> selected <?php endif; ?> >Tour</option>
                  <option value="trekking" <?php if($kategori['induk_kategori'] == 'trekking'): ?> selected <?php endif; ?>>Trekking</option>
                    <option value="alam" <?php if($kategori['induk_kategori'] == 'alam'): ?> selected <?php endif; ?>>Alam</option>
                      <option value="kuliner" <?php if($kategori['induk_kategori'] == 'kuliner'): ?> selected <?php endif; ?>>Kuliner</option>
                        <option value="budaya" <?php if($kategori['induk_kategori'] == 'budaya'): ?> selected <?php endif; ?>>Budaya & Pendidikan</option>
                          <option value="religi" <?php if($kategori['induk_kategori'] == 'religi'): ?> selected <?php endif; ?>>Religi</option>
                </select>
              </div>
              <div class="in">
                <label for="deskripsi_kategori" method="POST" class="">Description</label> <br>
                <textarea name="deskripsi_kategori" id="" cols="69" rows="5" style="padding: 5px;"><?= $kategori['deskripsi_kategori']; ?></textarea>
                
              </div>
              
              <input type="submit" value="Update" name="" id="" />
            </div>
          </form>
        </div>

        <div class="space" style="padding-bottom: 150px;"></div>

<?= $this->endSection(); ?>