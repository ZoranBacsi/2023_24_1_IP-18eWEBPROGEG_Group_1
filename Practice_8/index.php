
<!-- 
    1. Feladat
    Írjuk meg ciklussal és rekurzióval is azt a függvényt, amely kiszámítja egy adott egész szám faktoriálisát!
    (Mi történik, ha nem egészet adunk neki?)
-->

<h3>1. Feladat</h3>
<?php
    // declare(strict_types= 1);
    function fact_rec(int $n) {
        if( $n == 0) return 1;
        return fact_rec($n-1) * $n;
    }

    function fact_c($n) {
        $r = 1;
        for($i = 2; $i <= $n; $i++) $r *= $i;
        return $r;
    }
?>
<!-- Egyszerűbb php blokk -->
<?= fact_rec(5) . "<br>"?>
<?= fact_c(5) . "<br>"?>

<!--  
    2. Feladat
    Írassuk ki egyre kisebb címsorokkal (h1-tol h6-ig) a Helló világ! szöveget! 
-->

<h3>2. Feladat</h3>
<?php 
    for($i = 1; $i <= 6; $i++) echo "<h{$i}>Hello Világ!</h{$i}>";
?>

<!-- 
    3. Feladat
    Adott (beégetett) egy egész számokat tartalmazó tömb. Válogassuk ki belőle a páros számokat, majd
emeljük őket négyzetre! 
-->

<h3>3. Feladat</h3>
<?php 
    $t = [1, 2, 3, 4, 5, 6, 7];

    //print_r(array_map(function ($x){ return $x * $x; }, array_filter($t, function($x) { return $x % 2 == 0; })));

    // PHP 7.4 and above
    print_r(array_map(fn($x) => $x * $x, array_filter($t, fn($x) => $x % 2 == 0)));
?>

<!-- 
    4. Feladat 
    Tömbfüggvények tekintetében a PHP-tol sem teljesen idegenek a már JavaScriptbol ismert map, filter és reduce függvények megfeleloi, azonban nagyon hiányzik nekünk az every. 
    Írjuk meg az array_every függvényt, amely szigorúan egy tömböt és egy függvényt (callable) kapva eldönti, hogy a callable a tömb minden elemére igazat ad-e! 
    A feladatot oldjuk meg legalább kétféleképpen: foreach ciklus és iterátorfüggvények használatával is! 
-->

<h3>4. Feladat</h3>
<?php 
    $test1 = [2, 4, 8, 0, -4 ];
    $test2 = [4, 3, 0, 2, -4 ];
    function array_every1(array $arr,callable $fn): bool {
        foreach($arr as $v) if(!$fn($v)) return false;
        return true;
    }

    function array_every2(array $arr,callable $fn): bool {
        reset($arr);
        while ($e = current($arr)) {
            if(!$fn($e)) return false;
            next($arr);
        }
        return true;
    }

    function test_even(int $n): bool{
        return !($n % 2);
    }

    var_dump(array_every2($test1,"test_even"));
?>
<!-- 
    5. Feladat 
    Adott egy mémeket tartalmazó tömb. Jelenítsük meg őket felsorolásként!  
-->

<h3> 5. feladat</h3>
<?php 
$quotes = ["Szia, Lajos!","This is Sparta!","Én csak feljárok ide!","Hogy volt merszed?","Többet nem Gyula!","Még el sem nyerted méltó büntetésed"];
?>

<ul>
    <?php foreach($quotes as $e): ?>
        <li><?= $e ?></li>
    <?php endforeach; ?>
</ul>

<!--
    6.FeladatKészítsünk tesztrendszert! Egy változóban el kell tárolni a kérdések listáját, az egyes kérdésekhez tartozó lehetséges válaszokat (amelyek betujele is megadható) és a helyes válasz jelét. 
    Generáljunk HTML űrlapot, ahol jelölve van a helyes megoldás!
-->

<h3>6. Feladat</h3>

<?php 
    $kerdesek = [
        [
            "kerdes" => "Ki a Károly?",
            "valaszok" => ["a" => "Babi néni", "b" => "Rugós Beke", "c" => "Lakatos Brendon"],
            "helyes" => "c"
        ],[
            "kerdes" => "Ki a f@52@ gyerek?",
            "valaszok" => ["a" => "Big Daddy", "b" => "Döglégy", "c" => "Dopeman"],
            "helyes" => "b"
        ]
    ]
?>

<?php foreach ($kerdesek as $id => $q): ?>
    <b><?= $q["kerdes"] ?></b><br>
    <?php foreach ($q["valaszok"] as $sign => $text): ?>
        <input type="radio" name="q<?= $id ?>" value="<? $sign ?>" <?= $sign == $q["helyes"] ? "checked" : "" ?> disabled> <?= $sign . ".)". $text ?><br>
    <?php endforeach ?><br>
<?php endforeach ?>