


<fieldset>
    <legend>Tabel MAE</legend>
    

    <table>
        <tr>
            <th>MAE</th>

            <?php foreach ($predictionClass->maes->users as $user) : ?>
                <th class="text-center <?= $predictionClass->userIdRated == $user->id ? 'current-user' : '' ?>">
                    <?= $user->name ?>
                </th>
            <?php endforeach ?>

            <th class="text-center">Jumlah</th>
            <th class="text-center <?= $predictionClass->userIdRated == null ? 'current-user' : '' ?>">Avg</th>
        </tr>

        <?php foreach ($predictionClass->maes->maes as $maes) : ?>
         
            <tr>
                <th>
                    <?= $maes['product']->name ?>
                </th>

                <?php foreach ($maes['users'] as $mae) : ?>
                    <td class="text-center <?= $predictionClass->userIdRated == $mae['user']->id ? 'current-user' : '' ?>">
                        <?= number_format($mae['mae']->mae, 3) ?>
                    </td>
                <?php endforeach ?>

                <th class="text-center">
                    <?= number_format($maes['sum'], 3) ?>
                </th>

                <th class="text-center <?= $predictionClass->userIdRated == null ? 'current-user' : '' ?>">
                    <?= number_format($maes['avg'], 3) ?>
                </th>
            </tr>
        <?php endforeach ?>
    </table>

    <?php if ($predictionClass->userIdRated) : ?>
        <?= view('home/formula-mae-recomendation-for-user', ['predictionClass' => $predictionClass]); ?>
    <?php else : ?>
        <?= view('home/formula-mae-recomendation-for-guest', ['predictionClass' => $predictionClass]); ?>
    <?php endif ?>
    
</fieldset>
