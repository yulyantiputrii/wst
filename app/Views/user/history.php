
<?= $this->extend('user/layout'); ?>

<?= $this->section('header'); ?>
    <header style="height: 350px">
        <div class="shadow" style="height: 350px">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="title-tour">
<div class="title-tour">
    
          <h1><?= $title ?></h1>
        </div>
      </div>
    </header>
    <div id="overlay" onclick="off()"></div>

    <!-- </?php dd($history); ?> -->
    <div class="history">
        <?php if ($history == null) : ?>
            <div class="kosong">
                Tidak ada Riwayat!! <br>
                <a href="/cart"><small>Checkout keranjang anda sekarang</small></a>
            </div>
        <?php endif; ?>
        <?php foreach($history as $his): ?>
            <?php if($his['status_tour'] == 'ongoing') : ?>
                
                <div class="card">
                    <div class="top">
                        <a href="/detailhistory/<?= $his['id_transaksi']; ?>">
                            <h3><?= $his['nama_produk']; ?></h3>
                        </a>
                        <div class="stat">
                            <?php if($his['status_transaksi'] == 'unpaid') : ?>
                                <div class="status unpaid">Unpaid (<?= $his['jenis_transaksi']; ?>)</div>
                            <?php else: ?>
                                <div class="status paid">Paid (<?= $his['jenis_transaksi']; ?>)</div>
                            <?php endif; ?>
                            <div class="status ongoing">On Going</div>
                        </div>
                    </div>
                    <div class="line-history"></div>
                    <table>
                        <tr>
                            <!-- </?php if ($his['status_transaksi'] == 'unpaid'): ?>
                                <td>Order on </?= $his['created']; ?></td>
                            </?php elseif ($his['status_transaksi'] == 'paid'): ?>
                                <td>Paid on </?= $his['updated']; ?></td>
                            </?php endif; ?> -->
                            <td>Order on <?= $his['created']; ?></td>
                            <td>Tanggal Tour : <?= $his['tanggal_tour']; ?></td>
                            <td>Rp <?= $his['harga']; ?> x <?= $his['item']; ?> Person</td>
                            <td>Total : Rp <b><?= $his['total_biaya']; ?>,-</b></td>
                            <td width="200px" >
                                
                                    <?php if($his['jenis_transaksi'] == 'cod') : ?>
                                       <div style="color:red"> *Lakukan pembayaran dilokasi</div>
                                    <?php else: ?>

                                        <?php if($his['bukti_transaksi'] == null) :?>
                                            <a href="/uploadbukti">
                                                <!-- <div class="rate" style="font-size: 11px;">Upload bukti transfer</div> -->
                                                <div class="modalrate">
                                        <div class="interior">
                                            <a class="btn" href="#open-modal<?= $his['id_transaksi']; ?>"> 
                                                <div class="ratea">
                                                    Upload bukti transfer
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div id="open-modal<?= $his['id_transaksi']; ?>" class="modal-window">
                                        <div>
                                            <a href="/history" title="Close" class="modal-close">Close</a>
                                            <center>
                                                <h1>Upload bukti transfer !</h1>
                                                <p>Pembayaran ke rekening <br> <b>BRI : 228601036272506</b> An Retno Ekayanti</p>
                                            </center>

                                            <form action="/uploadbuktibayar/<?= $his['id_transaksi']; ?>" method="POST" enctype="multipart/form-data">
                                                <div class="file">
                                                    <input type="file" name="bukti_transfer" id="">

                                                </div>

                                                <br>
                                                .
                                                <div class="save">

                                                <button type="submit">Simpan Perubahan</button>
                                            </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                            </a>
                                        <?php else: ?>
                                            Sedang proses pembayaran
                                        <?php endif; ?>
                                    <?php endif; ?>
                                
                            </td>
                        </tr>
                    </table>
                </div>
                
        <?php endif; ?>
        <?php endforeach; ?>
        <?php foreach($history as $his): ?>
            <?php if($his['status_tour'] == 'finished') : ?>
                
                <div class="card" style="background-color: #bed0d1;">
                    <div class="top">
                    <a href="/detailhistory/<?= $his['id_transaksi']; ?>">
                            <h3><?= $his['nama_produk']; ?></h3>
                        </a>
                        <div class="stat">
                            <div class="status paid"><?= $his['status_transaksi']; ?>(Transfer)</div>
                            <div class="status finished">Finished Tour</div>
                        </div>
                    </div>
                    <div class="line-history"></div>
                    <table>
                        <tr>
                            <td>Order on <?= $his['created']; ?></td>
                            <td>Tanggal Tour : <?= $his['tanggal_tour']; ?></td>
                            <td>Rp <?= $his['harga']; ?> x <?= $his['item']; ?> Person</td>
                            <td>Total : Rp <b><?= $his['total_biaya']; ?>,- </b></td>
                            <td width="200px" >
                                <?php if($his['nilai_rating'] == null) : ?>
                                    <div class="modalrate">
                                        <div class="interior">
                                            <a class="btn" href="#open-modal<?= $his['id_transaksi']; ?>"> 
                                                <div class="ratea">
                                                    Rate
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div id="open-modal<?= $his['id_transaksi']; ?>" class="modal-window">
                                        <div>
                                            <a href="/history" title="Close" class="modal-close">Close</a>
                                            <center>

                                                <h1>Beri Rating !</h1>
                                            </center>
                                            <form action="/rate" method="POST">
                                                <input type="hidden" name="id_rating" value="<?= $his['id_rating']; ?>" id="">
                                            <div class="ratein">
                                                <input type="radio" id="star5" name="ratein" value="5" />
                                                <label for="star5" title="text">5 stars</label>
                                                <input type="radio" id="star4" name="ratein" value="4" />
                                                <label for="star4" title="text">4 stars</label>
                                                <input type="radio" id="star3" name="ratein" value="3" />
                                                <label for="star3" title="text">3 stars</label>
                                                <input type="radio" id="star2" name="ratein" value="2" />
                                                <label for="star2" title="text">2 stars</label>
                                                <input type="radio" id="star1" name="ratein" value="1" />
                                                <label for="star1" title="text">1 star</label>
                                            </div>
                                            <center>
                                                <textarea name="komentar" id="" cols="40" rows="5" placeholder="Beri ulasan"></textarea>
                                            </center>
                                            <small style="margin-left: 20px;">*Data yang di input tidak dapat dirubah</small>
                                            <div class="save">

                                                <button type="submit">Simpan Perubahan</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                
                                <?php else: ?>

                                    <?php 
                                        $rate = (int)$his['nilai_rating'];
                                        $rateminus = 5 - $rate;
                                        // var_dump($rateminus);
                                        if($rate > 0):  ?>
                                            <?php for($i=0; $i< $rate; $i++){ ?>
                                            <img src="/Horizon/Assets/icon/ratingblackk.png" alt="" />
                                            <?php } ?>
                                            <?php for($i=0; $i< $rateminus; $i++){ ?>
                                            <img src="/Horizon/Assets/icon/ratingblack.png" alt="" />
                                            <?php } ?>
                                        <?php endif; ?>
                                
                                <?php endif; ?>
                                
                            </td>
                        </tr>
                    </table>
                </div>
                
            <?php endif; ?>
        <?php endforeach; ?>

        

        <!-- <div class="card">
            <div class="top">
                <h3>Lorem A Tours</h3>
                <div class="stat">
                    
                    <div class="status paid">Paid (COD)</div>
                    <div class="status finished">Finished Tour</div>
                </div>
            </div>
            <table>
                <tr>
                    <td>Paid on 2022-12-01 06:58:03</td>
                    <td>Tours On Date : 2022-12-28</td>
                    <td>$50 x 2 Person</td>
                    <td>Total : <b>100.000</b></td>
                    <td width="200px" align="center" >
                    <img src="/Horizon/Assets/icon/rating.png" alt="" width="20px" />
                    <img src="/Horizon/Assets/icon/rating.png" alt="" width="20px" />
                    <img src="/Horizon/Assets/icon/rating.png" alt="" width="20px" />
                    <img src="/Horizon/Assets/icon/ratingg.png" alt="" width="20px" />
                    <img src="/Horizon/Assets/icon/ratingg.png" alt="" width="20px" />
                    </td>
                </tr>
            </table>
        </div> -->
        
    </div>

<?= $this->endSection(); ?>