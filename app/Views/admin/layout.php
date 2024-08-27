<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/Horizon/Assets/style/styleadmin.css" />
    <title>Admin</title>
  </head>
  <body>
    <header>
      <div class="logo">
        <img src="/Horizon/Assets/img/logo1.png" width="120px" alt="" />
    </div><p>Hi Admin</p>
    </header>
    <main>
      <div class="sidebar">
        <ul>
          <li>
            <a href="/admin">
              <div class="icon" style="background-image: url('/Horizon/Assets/icon/home.png')"></div>
              <p>Home</p>
            </a>
          </li>
          <li>
            <a href="/useradmin">
              <div class="icon" style="background-image: url('/Horizon/Assets/icon/group.png')"></div>
              <p>User Admin</p>
            </a>
          </li>
          <li>
            <a href="/kategoriadmin">
              <div class="icon" style="background-image: url('/Horizon/Assets/icon/category.png')"></div>
              <p>Kategori</p>
            </a>
          </li>
          <li>
            <a href="/produkadmin">
              <div class="icon" style="background-image: url('/Horizon/Assets/icon/package.png')"></div>
              <p>Product</p>
            </a>
          </li>
          <li>
            <a href="/ratingadmin">
              <div class="icon" style="background-image: url('/Horizon/Assets/icon/ratingdash.png')"></div>
              <p>Rating</p>
            </a>
          </li>
        <!--  <li>
            <a href="/transaksiadmin">
              <div class="icon" style="background-image: url('/Horizon/Assets/icon/shopping-cart.png')"></div>
              <p>Transaksi</p>
            </a>
          </li> -->
          <!-- <li>
            <a href="/">
              <div class="icon" style="background-image: url('/Horizon/Assets/icon/home.png')"></div>
              <p>Menu utama</p>
            </a>
          </li> -->
          <li>
            <a href="/logout">
              <div class="icon" style="background-image: url('/Horizon/Assets/icon/logout.png')"></div>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
      <div class="content">
        <!-- BUAT ISINYA NANTI DISINI AJA -->
        <!-- BUAT ISINYA NANTI DISINI AJA -->

        <?= $this->renderSection('content'); ?>


        <!-- BUAT PENUTUP ISINYA NANTI DISINI AJA -->
        <!-- BUAT PENUTUP ISINYA NANTI DISINI AJA -->
      </div>
    </main>
  </body>
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
      CKEDITOR.replace('ckeditor');
    </script>
</html>
