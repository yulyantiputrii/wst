<?= $this->extend('user/layout'); ?>

<?= $this->section('header'); ?>
<header style="height: 370px">
    <div class="shadow" style="height: 500px">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<style>
    .add-review {
        margin: 20px auto;
        padding: 20px;
        max-width: 500px;
        background-color: #f0f0f0;
        border-radius: 10px;
    }

    .add-review .form-group {
        margin-bottom: 15px;
    }

    .add-review label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .add-review select,
    .add-review textarea {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    .add-review .btn {
        text-align: center;
        margin-top: 20px;
    }

    .add-review .btn button {
        padding: 10px 20px;
        background-color: #ffcc00;
        border: none;
        border-radius: 5px;
        color: #000;
        cursor: pointer;
    }

    .add-review .btn button:hover {
        background-color: #ff9900;
    }

    .card-tour {
        background-color: #ff9900;
    }

    .title-tour {
        margin: 20px;
    }

    .title-tour h1 {
        font-size: 30px;
    }

    .price {
        font-size: 24px;
        font-weight: bold;
    }

    .detail-tours {
        display: flex;
        justify-content: space-between;
        padding: 20px;
    }

    .detail img {
        max-width: 100%;
        height: auto;
    }

    .detail .desk {
        margin-top: 20px;
    }

    .booking {
        max-width: 500px;
    }
</style>

<div class="title-tour">
    <h1><?= $produk['nama_produk']; ?></h1>
    <div class="price">Rp <?= $produk['harga']; ?></div>
</div>
</header>

<div class="detail-tours">
    <div class="detail">
        <center>
            <img src="/Horizon/Assets/img/<?= $produk['sampul']; ?>" width="800px" alt="<?= $produk['nama_produk']; ?>" />
        </center>
        <div class="desk"><?= $produk['deskripsi_produk']; ?></div>
        <center>
        <div class="maps"><?= $produk['maps']; ?></div>
        </center>

    </div>

    <div class="booking">
        <form action="/cart/addcart" method="post">
            <h2>Catat Rencana Perjalananmu</h2>
            <input type="hidden" name="id" value="<?= user()->id ?? ''; ?>">
            <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">
            <input type="date" name="tanggal_tour" id="tanggal_tour" placeholder="2022-12-17" required>
            <input type="text" name="item" id="item" placeholder="Catatan" required>

            <div class="btn">
                <?php if (!logged_in()) : ?>
                    <a href="/login"><div class="logindulu">Anda belum login</div></a>
                <?php else : ?>
                    <button type="submit">Simpan Wisata</button>
                <?php endif; ?>
            </div>
        </form>

        <form action="/rating/add" method="post">
            <h2>Tambahkan Ulasan</h2>
            <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">
            <input type="hidden" name="id" value="<?= user()->id ?? ''; ?>">

            <div class="add-review">
                <label for="rating">Rating:</label>
                <select name="nilai_rating" id="rating" required>
                    <option value="">Pilih Rating</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <div class="add-review">
                <label for="komentar">Komentar:</label>
                <textarea name="komentar" id="komentar" rows="3" required></textarea>
            </div>

            <div class="btn">
                <?php if (!logged_in()) : ?>
                    <a href="/login"><div class="logindulu">Anda belum login</div></a>
                <?php else : ?>
                    <button type="submit">Tambahkan Komentar</button>
                <?php endif; ?>
            </div>
        </form>

        <div class="card-tour">
            <h2 style="color: rgb(53, 53, 53);">Ulasan</h2>
            <?= session()->getFlashdata('message'); ?>
            <?php foreach ($rating as $r) : ?>
                <?php if ($r['nilai_rating'] != null && $r['nilai_rating'] != 0) : ?>
                    <hr>
                    <div class="headercomment">
                        <div class="nama"><?= $r['fullname'] ?? 'anonim'; ?></div>
                        <div class="ratingg">
                            <?php 
                            $rate = (int)$r['nilai_rating'];
                            $rateminus = 5 - $rate;
                            for ($i = 0; $i < $rate; $i++) { ?>
                                <img src="/Horizon/Assets/icon/rating.png" alt="Rating" />
                            <?php }
                            for ($i = 0; $i < $rateminus; $i++) { ?>
                                <img src="/Horizon/Assets/icon/ratingg.png" alt="Rating" />
                            <?php } ?>
                        </div>
                    </div>
                    <div class="isicomment"><?= $r['komentar']; ?></div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
