<?php
    // Resolve datas from JSON file
    $json = file_get_contents("data.json");
    $datas = json_decode($json, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Keatten</title>
</head>
<body>
    <div id="home">
        <div class="text-center p-5">
            <img src="leo.jpg" class="rounded-circle" height="100px" alt="">
            <h1>Keatten</h1>
            <h4>Pour sauver Léonard</h4>
        </div>
        <form method="POST" action="add-lunch.php"> 
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <label class="input-group-text" for="name">Je m'appelle</label>
                    </div>
                    <select class="custom-select" name="name">
                    <option selected>Clément</option>
                    <option>Léa</option>
                    <option>Odile</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="gr" value="50">
                    <div class="input-group-append">
                    <span class="input-group-text">Grammes de croquettes</span>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
        <h3 class="text-center p-3">Stock de croquettes</h3>
        <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h3 class="text-center p-3">Historique</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Grammes</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            <?php if (isset($datas)): ?>
                <?php foreach ($datas as $data): ?>  
                    <tr>
                        <th scope="row"><?= $data['id'] ?></th>
                        <td><?= $data['name'] ?></td>
                        <td><?= $data['gr'] ?></td>
                        <td><?= $data['date'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>