<?php
    session_start();
    $result = [];
    $filter = $_GET['filter'] ?? '';

    if(isset($_SESSION["userid"])){
        $data = json_decode(file_get_contents("data.json"), true);
        $grades = ["","elégtelen","elégséges","közepes","jó","jeles"];
    
        foreach ($data as $value) {
            if(trim($filter === '' || strpos($value["targykod"],$filter) !== false)) {
                $value['jegy'] = $grades[$value['jegy']];
                unset($value["id"]);
                $result[] = $value;
            }
        }
    }
    echo json_encode($result, JSON_PRETTY_PRINT);
?>