<?php
    if(isset( $_GET["taj"] )){
        $reg = json_decode(file_get_contents("data.json"), true);
        if(isset($reg[$_GET["taj"]])){
            $r = $reg[$_GET["taj"]];
        } else header('location: index.php');
    }else header('location: index.php');
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adatok</title>
</head>
<body>
    Teljes név: <?= $r["fullname"] ?><br>
    E-mail: <?= $r["email"] ?><br>
    TAJ szám: <?= $r["taj"] ?><br>
    Életkor:  <?= $r["age"] ?><br>
    Nem: <?= $r["gender"] == 'm' ? "Férfi" : "Nő" ?><br>
    Regisztráció dátuma: <?= $r["regdate"] ?><br>
    Megjegyzés:  <?= $r["notes"] ?><br>
    <a href="delete.php?taj=<?= $r["taj"] ?>">Törlés</a> <br>
    <a href="index.php">Vissza a kezdőlapra</a>
</body>
</html>
