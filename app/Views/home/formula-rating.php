<fieldset>
    <legend>Tabel Rating Rata-Rata</legend>

    <table>
        <tr>
            <th>Rating</th>
            <?php foreach ($predictionClass->ratings->users as $user) : ?>
                <th class="text-center <?= $predictionClass->userIdRated == $user->id ? 'current-user' : '' ?>">
                    <?= $user->name ?>
                </th>
            <?php endforeach ?>

            <th class="text-center">
                Avg
            </th>
        </tr>

        <?php foreach ($predictionClass->ratings->product_ratings as $product_rating) : ?>
            <tr>
                <th>
                    <?= $product_rating['product']->name ?>
                </th>

                <?php foreach ($product_rating['users'] as $user) : ?>
                    <td class="text-center <?= $predictionClass->userIdRated == $user->id ? 'current-user' : '' ?>">
                        <?= number_format($user->rating, 3) ?>
                    </td>
                <?php endforeach ?>

                <th class="text-center">
                    <?= number_format($product_rating['rating_avg'], 3) ?>
                </th>
            </tr>
        <?php endforeach ?>

        
    </table>
</fieldset>
