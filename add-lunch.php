<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Keatten</title>
</head>
<?php
    $name = $_POST['name'];
    $gr = $_POST['gr'];
    $date = new DateTime();
    $json = file_get_contents("data.json");
    $data = json_decode($json, true);
    $last_ts = $data[sizeof(data) - 1]['ts'];

    $ip = explode('.', $_SERVER['REMOTE_ADDR']);
    if (($last_ts + 86400 < time()) && $ip[0] == '192' && $ip[1] == '168' && $ip[2] == 0) {
        $data[] = [
            'id' => sizeof($data),
            'name' => $name,
            'gr' => $gr,
            'date' => $date->format('d-m-Y'),
            'ts' => time()
        ];
        $fd = fopen('data.json', 'w');
        fwrite($fd, json_encode($data));
        fclose($fd);
        $error = 1;
    } else {
	if ($ip[0] != '192' || $ip[1] != '168' || $ip[2] != '0') {
	  $error = 3;
	} else {
	  $error = 2;
	}
    }
?>
    <?php if ($error === 1): ?>
        <div class="alert alert-success" role="alert">
            Miaou, bon appétit !
        </div>
    <?php endif; ?>
    <?php if ($error === 2): ?>
        <div class="alert alert-warning" role="alert">
            J'ai déjà mangé repasse plus tard !
        </div>
    <?php endif; ?>
    <?php if ($error === 3): ?>
        <div class="alert alert-danger" role="alert">
            Je ne crois pas que tu puisses me nourir en dehors de mon réseau local
        </div>
    <?php endif; ?>
    <div class="text-center p-5">
        <img src="leo.jpg" class="rounded-circle" height="100px" alt="">            
    </div>
    <div class="text-center">
        <a href="/" class="btn btn-primary stretched-link">Revenir</a>
    </div>
</body>
</html>
