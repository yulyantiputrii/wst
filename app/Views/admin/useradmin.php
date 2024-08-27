<?= $this->extend('admin/layout'); ?>

<?= $this->section('content'); ?>


        <div class="title">
          <h2><?= $title; ?></h2>
          <p>Admin / Kategori</p>
        </div>
        <?php if(!empty(session()->getFlashdata('pesan'))){ ?>
              <div class="alert alert-success">
                  <?php echo session()->getFlashdata('pesan');?>
              </div>
            <?php } ?>
        <div class="board">
          <div class="button-add"><a href="#">+ Add Data</a></div>
          <table>
            <tr class="headline">
              <td>No</td>
              <td>Username</td>
              <td>Email</td>
              <td>Akses</td>
              <td>Action</td>
            </tr>
            <?php $i=1; ?>
            <?php foreach($users as $user):?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $user->username; ?></td>
              <td><?= $user->email; ?></td>
              <td><?= $user->name; ?></td>
              <td class="status"><abbr title="Edit Data"
                  ><a href="useradmin/<?= $user->userid; ?>"><img src="/Horizon/Assets/icon/edit.png" alt="" /></a
                ></abbr>
                <abbr title="Hapus Data"
                  ><a href="#"><img src="/Horizon/Assets/icon/trash.png" alt="" /></a
                ></abbr>
              </td>
            </tr>
            <?php endforeach; ?>
          </table>
        </div>

<?= $this->endSection(); ?>