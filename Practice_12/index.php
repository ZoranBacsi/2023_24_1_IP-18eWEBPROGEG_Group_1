<?php
    session_start();
    
    $data = json_decode(file_get_contents("data.json"), true);
    $grades = ["","elégtelen","elégséges","közepes","jó","jeles"];

    $error = "";

    if(isset($_SESSION['loginerror'])){
        if($_SESSION['loginerror'] == 1) $error = "A felhasználónév megadása kötelező!";
        if($_SESSION['loginerror'] == 2) $error = "A jelszó nem megfelelő";
        unset($_SESSION['loginerror']);
    }

    if(isset($_SESSION['userid'])){
        $reg = json_decode(file_get_contents('users.json'), true);
        $user = $reg[$_SESSION['userid']];
        if($user['isAdmin'] && isset($_POST['subject']) && isset($_POST['grade'])){
            $sub = $_POST['subject'];
            $grade = intval($_POST['grade']);
            $data[$sub]['jegy'] = $grade;
            file_put_contents('data.json', json_encode($data,JSON_PRETTY_PRINT)); 
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gyakorlat 12.</title>
</head>
<body>
    <?php if(isset($_SESSION['userid'])): ?>
        <h1>Hello, <?= $user['username'] ?>!( <a href="logout.php">Logout</a> )</h1>
        <input type="text" id="filter"> <button id="refresh">Frissítés</button>
        <table>
            <tr>
                <th>Tárgykód</th>
                <th>Tárgy neve</th>
                <th>Oktató</th>
                <th>Kredit</th>
                <th>Osztályzat</th>
            </tr>
            <?php foreach ($data as $key => $value): ?>
                <tr>
                    <td><?= $value['targykod']?></td>
                    <td><?= $value['targynev']?></td>
                    <td><?= $value['oktato']?></td>
                    <td><?= $value['kredit']?></td>
                    <td><?= $grades[$value['jegy']]?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php if($user['isAdmin']): ?>
            <h2>Jegybeírás</h2>
            <form action="index.php" method="post">
                Tárgy: 
                <select name="subject">
                    <?php foreach (array_filter($data, fn($t) => $t['jegy'] == 0) as $key => $value): ?>
                        <option value="<?= $key ?>"><?= $value['targynev']?></option>
                    <?php endforeach; ?> 
                </select>
                Jegy: <input type="number" name="grade" min="1" max="5" value="5">
                <button type="submit">Mentés</button>
            </form>
        <?php endif; ?> 
    <?php else: ?>
        <form action="login.php" method="post">
            Username: <input type="text" name="un"><br>
            Password: <input type="password" name="pw"><br>
            <button type="submit">Bejelentkezés</button>
        </form>
        <span style="color:red"><?= $error ?> </span>
    <?php endif; ?>
    
    <script src="ajax.js"></script>
</body>
</html>