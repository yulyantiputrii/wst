<?= $this->extend('admin/layout'); ?>

<?= $this->section('content'); ?>
<div class="list-admin" style="padding-bottom: 350px;">
          <a href="/userakses">
            <div class="container">
              <img src="/Horizon/Assets/icon/user.png" width="70px" alt="" />
              <p>1239</p>
            </div>
          </a>
          <a href="/produk">
            <div class="container">
              <img src="/Horizon/Assets/icon/package.png" width="70px" alt="" />
              <p>56</p>
            </div>
          </a>
          <a href="/kategori">
            <div class="container">
              <img src="/Horizon/Assets/icon/category.png" width="70px" alt="" />
              <p>6</p>
            </div>
          </a>
          <a href="/rating">
            <div class="container">
              <img src="/Horizon/Assets/icon/ratingdash.png" width="70px" alt="" />
              <p>2718</p>
            </div>
          </a>
        </div>

<?= $this->endSection(); ?>