<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dvimaciai masyvai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">Skelbimai:</div>
                <div class="card-body">
                    <?php include "skelbimai.php"; ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Skelbimo tekstas</th>
                                <th>Kaina</th>
                                <th>Apmoketa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($skelbimai as $skelbimai) { ?>
                                <tr>
                                    <td><?= $skelbimai['id'] ?></td>
                                    <td><?= $skelbimai['text'] ?></td>
                                    <td><?= $skelbimai['cost'] ?></td>
                                    <td><?php
                                        if ($skelbimai['onPay'] > 0) {
                                            echo date("j, n, Y", $skelbimai['onPay']);
                                        } else {
                                            echo "Neapmokėta";
                                        }
                                        ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <?php
                    $apmoketaVnt = 0;
                    $gautaSuma = 0;
                    $neapmoketaSuma = 0;
                    foreach ($skelbimai as $skelbimai) {
                        if ($skelbimai['onPay'] > 0) {
                            $apmoketaVnt++;
                            $gautaSuma += $skelbimai['cost'];
                        } else {
                            $neapmoketaSuma += $skelbimai['cost'];
                        }
                    }
                    echo "Viso skelbimų: " . sizeof($skelbimai) . '<br>';
                    echo "Apmokėti skelbimai: " . $apmoketaVnt . '<br>';
                    echo "Gauta suma už skelbimus: " . $gautaSuma . ' EUR <br>';
                    echo "Neapmokėta suma: " . $neapmoketaSuma . ' EUR <br>';

                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>