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

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Įveskite duomenis</div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="data" class="form-label"></label>
                                <textarea name="data" id="data" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <button class="btn btn-success">Skaičiuoti</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Apskaičiuotas masyvas</div>
                    <div class="card-body">
                        <?php
                        if (isset($_POST['data'])) {
                            $dataS = $_POST['data'];
                            $dataSR = explode("\n", $dataS);
                            $data = [];
                            foreach ($dataSR as $t) {
                                $data[] = explode(" ", $t);
                            }

                            $N = sizeof($data);
                            for ($i = 0; $i < $N; $i++) {
                                $rowSum = 0;
                                $colSum = 0;
                                for ($j = 0; $j < $N; $j++) {
                                    $rowSum += (int)$data[$i][$j];
                                    $colSum += (int)$data[$j][$i];
                                }

                                echo $rowSum;
                                echo "<br>";
                                echo $colSum;
                                echo "<br>";
                            }

                            $istrizai1 = 0;
                            $istrizai2 = 0;
                            for ($i = 0; $i < $N; $i++) {
                                $istrizai1 += $data[$i][$i];
                                $istrizai2 += $data[$i][$N - $i - 1];
                            }
                            echo $istrizai1;
                            echo "<br>";
                            echo $istrizai2;
                            echo "<br>";

                            if (
                                $colSum != $istrizai1 &&
                                $colSum != $rowSum &&
                                $colSum != $istrizai2
                            ) {
                                echo "Deja..";
                            } else {
                                echo "Kvadratas yra magiskas!";
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>





</body>

</html>