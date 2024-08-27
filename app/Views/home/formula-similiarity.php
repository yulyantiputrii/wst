<fieldset>
    <legend>Tabel Similarity</legend>

    <table>
        <tr>
            <th>Similarity</th>

            <?php foreach ($predictionClass->similiarities->products as $products) : ?>
                <th class="text-center">
                    <?= $products->name ?>
                </th>
                <?php endforeach ?>
            </tr>
            

            <?php 
           // display the similarities array
            foreach ($predictionClass->similiarities->similiarities as $similiarities) : ?>
          

                <tr>
                    <th>
                        <?= $similiarities['product']->name ?>
                    </th>
                    
                    <?php foreach ($similiarities['compares'] as $similiarity) : ?>
                        <td class="text-center">
                            <?= number_format($similiarity['similiarity']->similiarity, 3) ?>
                        </td>
                        <?php endforeach ?>
                    </tr>
        <?php endforeach ?>
    </table>
</fieldset>
