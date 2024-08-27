<?php
$recomendationProductsGuest = $predictionClass->recomendationProductsForGuest();
?>

<ol>
    <div class="main-lates">
    <h3 style="margin-left: 80px; color:  rgb(216, 216, 216);">Anda mungkin menyukai:</h3>
        <div class="list-product">
            <div class="list-post" >
    <?php foreach ($recomendationProductsGuest as $product) : ?>
                    <a href="/detailtour/<?= $product->id_produk; ?>">
                        <div class="card-post">
                        <!-- isi -->
                        <div class="header-card" style="background-image: url('/Horizon/Assets/img/<?= $product->sampul; ?>')">
                            <div class="shadow-card">
                            
                            <div class="harga">Rp <?= $product->harga; ?></div>
                            </div>
                        </div>
                        <div class="ket">
                            <h2><?= $product->nama_produk; ?></h2>
                            <div class="line-post"></div>
                            <b><p></p></b>
                            <p><?= substr($product->deskripsi_produk, 0, 100); ?></p>
                        </div>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
</ol>
