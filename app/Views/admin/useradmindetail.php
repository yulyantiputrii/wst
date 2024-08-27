<?= $this->extend('admin/layout'); ?>

<?= $this->section('content'); ?>


        <div class="title">
          <h2><?= $user->username; ?> </h2>
          <p>Admin / Profile</p>
        </div>
        <div class="board">
          <form action="" class="profile-admin">
          <?= csrf_field() ?>
            <div class="profil-pict">
            <div style="
                margin-top: 50px;
                width: 150px;
                height: 150px;
                background-image: url('/Horizon/Assets/img/dashboard/<?= $user->user_image; ?>');
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;">
          </div> <br>
             
            </div>

            <table style="margin-left:50px;">
              <tr>
                <td style="width: 140px;">Nama</td>
                <td>:</td>
                <td><?= $user->fullname; ?></td>
              </tr>
              <tr>
                <td>Email</td><td>:</td>
                <td><?= $user->email; ?></td>
              </tr>
              <tr>
                <td>Username</td><td>:</td>
                <td><?= $user->username; ?></td>
              </tr>
              <tr>
                <td>Phone Number</td><td>:</td>
                <td><?= $user->phone_number; ?></td>
              </tr>
              <tr>
                <td>Instagram</td><td>:</td>
                <td><?= $user->instagram; ?></td>
              </tr>
              <tr>
                <td>Country</td><td>:</td>
                <td><?= $user->country; ?></td>
              </tr>
              <tr>
                <td>City</td><td>:</td>
                <td><?= $user->city; ?></td>
              </tr>
              <tr>
                <td>Joined</td><td>:</td>
                <td><?= $user->joined; ?></td>
              </tr>
              <tr>
                <td>Akses</td><td>:</td>
                <td>
                    <?php if($user->name == 'admin') : ?><div style="border-radius: 100px; background-color: rgb(247, 146, 146); width:100px; padding: 5px 25px;"> Admin </div><?php endif ?>
                    <?php if($user->name == 'user') : ?><div style="border-radius: 100px; background-color: lightgreen; width:100px; padding: 5px 25px;"> User </div><?php endif ?>
                </td>
              </tr>
              <tr>
              </tr>
            </table>
            
          </form>
        </div>


<?= $this->endSection(); ?>