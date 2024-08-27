<br />
<table>
    <tr>
        <th>Rekomendasi Berdasarkan Prediksi</th>
        <th>Produk</th>
        <th class="text-center">Prediksi</th>
    </tr>

    <?php $no = 1 ?>
    <?php foreach ($predictionClass->predictionRecomendationsForUser as $recomendation) : ?>
        <tr>
            <th>
                <?= $no++ ?>
            </th>
            <td>
                <?= $recomendation['product']->name ?>
            </td>
            <th class="text-center">
                <?= number_format($recomendation['prediction'], 3) ?>
            </th>
        </tr>
    <?php endforeach ?>
</table>
