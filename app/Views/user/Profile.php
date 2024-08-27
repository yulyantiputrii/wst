
    <?= $this->extend('user/layout'); ?>

<?= $this->section('header'); ?>
    <header style="height: 350px">
        <div class="shadow" style="height: 350px">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="title-tour">
          <h1>Hello <?= user()->username; ?>!</h1>
          
        </div>
      </div>
    </header>
    <div class="profile-edit">
      <form action="/profile/update/<?= user()->id; ?>" method="POST">
        <div class="foto">
          <div class="profilepict" style="background-image: url('/Horizon/Assets/img/dashboard/<?= user()->user_image; ?>');">
          </div>
          
          <br />
          <input type="file" name="sampul" value="<?= user()->user_image; ?>" />
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
        <div class="inputan">
          <div class="input">
            <label for="nama" method="POST" class="">Nama Lengkap </label>
            <input type="text" name="fullname" id="fullname" class="" value="<?= user()->fullname; ?>" placeholder="Masukkan Nama Lengkap" required />
          </div>
          <div class="input">
            <label for="usia" method="POST" class="">Tanggal Lahir</label>
            <input type="date" name="birthday" id="birthday" class="" value="<?= user()->birthday; ?>" />
          </div>          
          <div class="input">
            <label for="email" method="POST" class="">E-mail</label>
            <input type="email" name="email" id="email" class="" value="<?= user()->email; ?>" readonly required />
          </div>
          <div class="input">
            <label for="username" method="POST" class="">Username</label>
            <input type="text" name="username" id="username" value="<?= user()->username; ?>" class="" required readonly/>
          </div>
          <div class="input">
            <label for="phone" method="POST" class="">Nomor Telephone</label>
            <input type="text" name="phone_number" id="phone_number" value="<?= user()->phone_number; ?>" class="" required placeholder="Telephone yang dapat dihubungi"/>
          </div>
          <div class="input">
          <label for="instagram" method="POST" class="">Instagram</label>
              <input type="text" name="instagram" id="instagram" value="<?= user()->instagram; ?>" class="" placeholder="Masukkan instagram aktif" />
          </div>
          <div class="input">
          <label for="country" method="POST" class="">Negara</label>
              <input type="text" name="country" id="country" value="<?= user()->country; ?>" placeholder="Negara Asal" class="" />
          </div>
          <div class="input">
          <label for="city" method="POST" class="">Kota</label>
              <input type="text" name="city" id="city" value="<?= user()->city; ?>" class="" placeholder="Kota Asal" />
          </div>
          
          <div class="btn-profile">
            <input type="submit" value="Update" />
          </div>
        </div>
      </form>
    </div>
    


<?= $this->endSection(); ?>