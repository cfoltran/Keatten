<?php
    $name = $_POST['name'];
    $gr = $_POST['gr'];
    $date = new DateTime();
    $json = file_get_contents("data.json");
    $data = json_decode($json, true);
    var_dump(sizeof($data));
    $data[] = [
        'id' => sizeof($data),
        'name' => $name,
        'gr' => $gr,
        'date' => new DateTime()
    ];
    $fd = fopen('data.json', 'w');
    fwrite($fd, json_encode($data));
    fclose($fd);
?>