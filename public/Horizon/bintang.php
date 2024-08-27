<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

    $rate = 3;
    $rateminus = 5 - $rate; //2

    if ($rate == 0){
        echo "belum memberi rate";
    } else {
        for($i = 0; $i < $rate; $i++){
            echo "<img src='Assets/icon/rating.png' style='width: 15px;' />";
        }
        for($i = 0; $i < $rateminus; $i++){
            echo "<img src='Assets/icon/ratingg.png' style='width: 15px;' />";
        }
    }

    $data = 'L';

    ?>

    <label>
        <input type="radio" name="jenis_kelamin" value="L" 
        <?php if($data == 'L') 
        echo 'checked'?>
        >L
    </label>
    <label>
        <input type="radio" name="jenis_kelamin" value="P" 
        <?php if($data == 'P') 
        echo 'checked'?>
        >P
    </label> 
</body>
</html>

