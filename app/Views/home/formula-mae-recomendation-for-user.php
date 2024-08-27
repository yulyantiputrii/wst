<br />
<table class="table table-bordered table-condensed">
    <tr>
        <th>Rekomendasi Berdasarkan MAE</th>
        <th>Produk</th>
        <th class="text-center">MAE</th>
    </tr>

    <?php $no = 1 ?>
    <?php foreach ($predictionClass->maeRecomendationsForGuest as $recomendation) : ?>
        <tr>
            <th>
                <?= $no++ ?>
            </th>
            <td>
                <?= $recomendation['product']->name ?>
            </td>
            <th class="text-center">
                <?= number_format($recomendation['mae'], 3) ?>
            </th>
        </tr>
    <?php endforeach ?>
</table>
