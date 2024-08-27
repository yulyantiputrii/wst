<?= $this->extend('admin/layout'); ?>

<?= $this->section('content'); ?>


        <div class="title">
          <h2><?= $title; ?></h2>
          <p>Admin / <?= $title; ?></p>
        </div>
        <div class="board">
          <form action="/kategoriadmin/save" method="POST" class="profile-admin">
            <?= csrf_field(); ?> 
            <div class="ident">
              <div class="in">
                <label for="nama_kategori" method="POST" class="">Category Name</label>
                <input type="text" name="nama_kategori" id="nama_kategori" value="" class="" required />
              </div>
              <div class="in">
                <label for="induk_kategori" method="POST" class="">Category Parent</label><br>
                <select name="induk_kategori" id="induk_kategori" style="padding: 5px; margin:3px 0 3px; width:100%;">
                  <option value="alam" selected>Alam</option>
                  <option value="kuliner">Kuliner</option>
                  <option value="budaya">Budaya & Pendidikan</option>
                  <option value="religi">Religi</option>
                </select>
              </div>
              <div class="in">
                <label for="deskripsi_kategori" method="POST" class="">Description</label> <br>
                <textarea name="deskripsi_kategori" id="deskripsi_kategori" cols="69" rows="5" style="padding: 5px;"></textarea>
              </div>  
              <input type="submit" value="Add Data" name="" id="" />
             
            </div>
          </form>
        </div>
        <div class="space" style="padding-bottom: 150px;"></div>

<?= $this->endSection(); ?>