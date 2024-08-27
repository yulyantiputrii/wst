<fieldset>
    <legend>Tabel Prediksi</legend>

    <table>
        <tr>
            <th>Prediksi</th>

            <?php foreach ($predictionClass->predictions->users as $user) : ?>
                <th class="text-center <?= $predictionClass->userIdRated == $user->id ? 'current-user' : '' ?>">
                    <?= $user->name ?>
                </th>
            <?php endforeach ?>
        </tr>
                
        <?php 

        foreach ($predictionClass->predictions->predictions as $predictions) : ?>
            <tr>
                <th>
                    <?= $predictions['product']->name ?>
                </th>

                <?php foreach ($predictions['users'] as $prediction) : ?>
                    <td class="text-center <?= $predictionClass->userIdRated == $prediction['user']->id ? 'current-user' : '' ?>">
                        <?= number_format($prediction['prediction']->prediction, 3) ?>
                    </td>
                <?php endforeach ?>
            </tr>
        <?php endforeach ?>
    </table>

    <?php if ($predictionClass->userIdRated) : ?>
        <?= view('home/formula-prediction-recomendation-for-user', ['predictionClass' => $predictionClass]); ?>
    <?php endif ?>
</fieldset>
