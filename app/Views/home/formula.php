<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formula</title>
    <style>
        table,
        th,
        td {
            border: 1px solid;
        }

        .text-center {
            text-align: center;
        }

        .current-user {
            background-color: #00FF00;
        }
    </style>
</head>

<body>
    
    <h1>Produk yang Kami Sarankan Untuk 
        <!-- </?= $predictionClass->user()->username ?? 'Guest'; ?> -->
        <?= user()->username ?? 'Guest'; ?>
    </h1>
    <!-- </?php dd($predictionClass->predictions->predictions); ?> -->
    <!-- section perhitungan -->
    <?= view('home/formula-rating', ['predictionClass' => $predictionClass]); ?>
    <?= view('home/formula-similiarity', ['predictionClass' => $predictionClass]); ?>
    <?= view('home/formula-prediction', ['predictionClass' => $predictionClass]); ?>
    <?= view('home/formula-mae', ['predictionClass' => $predictionClass]); ?>
    <!-- section perhitungan -->

    <h1>Urutan Produk yang Disarankan</h1>


    <?php if ($predictionClass->userIdRated) : ?>
        <?= view('home/formula-recomendation-for-user', ['predictionClass' => $predictionClass]); ?>
    <?php else : ?>
        <?= view('home/formula-recomendation-for-guest', ['predictionClass' => $predictionClass]); ?>
    <?php endif ?>
</body>

</html>
