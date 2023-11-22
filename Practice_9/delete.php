<?php
    if(isset( $_GET["taj"] )){
        $reg = json_decode(file_get_contents("data.json"), true);
        if(isset($reg[$_GET["taj"]])){
            unset($reg[$_GET["taj"]]);
            file_put_contents("data.json",json_encode($reg, JSON_PRETTY_PRINT));
        }
    }

    header('location: index.php');
?>
