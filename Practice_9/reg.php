<?php
    $regdate = $_POST['regdate'] ?? date('Y-m-d');
    $fullname = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $taj = $_POST['taj'] ?? '';
    $age = $_POST['age'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $accept = $_POST['accept'] ?? false;
    $accept = filter_var($accept,FILTER_VALIDATE_BOOLEAN);
    $notes = $_POST['notes'] ?? '';

    if(count($_POST) > 0) {
        $errors = [];

        if(trim($fullname) === '') $errors['fullname'] = 'A név megadása kötelező!';
        else if(count(explode(' ',trim($fullname))) < 2) $errors['fullname'] = 'A név minimum két szóból kell álljon';

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Az e-mail formátuma nem megfelelő';

        if(strlen(trim($taj)) != 9) {
            $errors['taj'] = "Tajszám 9 számjegy hosszú kell legyen!";
        }else{
            if(count(array_filter(str_split(trim($taj)), fn($char) => $char >= '0' && $char <= '9')) != 9) 
                $errors['taj'] = "A taj szám csak számjegyeket tartalmazhat!";
        }

        if(filter_var($age, FILTER_VALIDATE_INT) === false){
            $errors["age"] = "Az életkor egész szám kell legyen és megadása kötelező!";
        }else{
            $age = intval($age);
            if($age < 1) $errors["age"] = "Az életkor pozitív szám kell legyen.";
        }

        if(trim($gender) === '') 
            $errors['gender'] = 'A nem megadása kötelező';
        else if (trim($gender) !== 'm' && trim($gender) !== 'f')
            $errors['gender'] = 'A nem csak férfi vagy nő lehet';

        if(!$accept) $errors['accept'] = 'A feltételek elfogadása kötelező';

        $errors = array_map(fn($e) => "<span style='color: red'> $e </span>", $errors);

        if(count($errors) == 0) {
            $reg = json_decode(file_get_contents("data.json"), true);

            $reg[$taj] = [
                'fullname' => $fullname,
                'email'=> $email,
                'taj'=> $taj,
                'age'=> $age,
                'gender' => $gender,
                'regdate'=> $regdate,
                'notes' => $notes
            ];

            file_put_contents("data.json",json_encode($reg, JSON_PRETTY_PRINT));
        }
    }
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció</title>
</head>
    <?php
        if(count($_POST) > 0 && count($errors) == 0){
            echo "<span style='color: green'> Mentés sikeres! </span>";

            $fullname = '';
            $email = '';
            $taj = '';
            $age = '';
            $gender = '';
            $accept = false;
            $notes = '';
            
            sleep(5);
            header('location: index.php');
        }
    ?>
    <form action="reg.php" method="post">
        Teljes név: <input type="text" name="fullname" value="<?= $fullname ?>"> <?= $errors['fullname'] ?? '' ?><br>
        E-mail: <input type="text" name="email" value="<?= $email ?>">  <?= $errors['email'] ?? '' ?><br>
        TAJ szám: <input type="text" name="taj" value="<?= $taj ?>">  <?= $errors['taj'] ?? '' ?> <br>
        Életkor: <input type="text" name="age" value="<?= $age ?>">  <?= $errors['age'] ?? '' ?>   <br>
        Nem:
            <input type="radio" name="gender" value="m" <?= $gender === 'm' ? 'checked' :  '' ?>>Férfi
            <input type="radio" name="gender" value="f" <?= $gender === 'f' ? 'checked' :  '' ?>>Nő
            <?= $errors['gender'] ?? '' ?><br><br>
        <input type="checkbox" name="accept" <?= $accept ? 'checked' : '' ?>> Elfogadom a feltételeket. <?= $errors['accept'] ?? '' ?> <br>
        Regisztráció dátuma: <input type="date" name="regdate" value="<?= $regdate ?>"><br>
        Megjegyzés: <br><textarea name="notes"><?=  $notes ?></textarea><br>
        <button type="submit">Regisztráció</button>
    </form>
    <a href="index.php">Vissza a kezdőlapra</a>
</body>
</html>