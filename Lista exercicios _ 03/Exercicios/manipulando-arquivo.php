<?php
$flag_msg = null;
$msg = "";

if (isset($_GET['enviar'])) {
  $time1 = $_GET["time1"];
  $time2 = $_GET["time2"];
  $time3 = $_GET["time3"];
  $time4 = $_GET["time4"];
  $time5 = $_GET["time5"];

  $file_name = "times.txt";

  $file = fopen("{$file_name}", "a+");

  $times = array();

  array_push($times, $time1);
  array_push($times, $time2);
  array_push($times, $time3);
  array_push($times, $time4);
  array_push($times, $time5);

  $cont = 1;
  foreach($times as $t) {
      fwrite($file, "Time {$cont} - Nome: {$t} \n");   
      $cont++;
  }

  fclose($file);

  $flag_msg = true;

  $msg = "Times foram salvos no arquivo! <br/><br/>";

  $file = fopen("{$file_name}", "r");

  $conteudo = fread($file, filesize($file_name));

  $msg .= "Apresentando os times: <br/><br/>";

  $msg .= $conteudo;

  fclose($file);
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercicio 02_lista03</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Receber/armazenar/imprimir nomes de times</h1>
  <hr class="my-3">
  <p class="lead">Esse exemplo recebe 5 nomes de times, os guarda e depois exibe.</p>
</div>

<div class="container">
  <form method="GET">
    <div class="form-group col-md-2">
      <label for="time1">Time 1:</label>
      <input type="text" class="form-control" id="time1" name="time1" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="time2">Time 2:</label>
      <input type="text" class="form-control" id="time2" name="time2" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="time3">Time 3:</label>
      <input type="text" class="form-control" id="time3" name="time3" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="time4">Time 4:</label>
      <input type="text" class="form-control" id="time4" name="time4" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="time5">Time 5:</label>
      <input type="text" class="form-control" id="time5" name="time5" required>
    </div>
    <br />
    <button type="submit" class="btn btn-primary mb-2" name="enviar">Enviar</button>
    <a href="exercicio01.php"><button type="button" class="btn btn-primary mb-2" name="limpar">Limpar</button></a>
  </form>
  <?php 
    if (!is_null($flag_msg)) {
      if ($flag_msg) {
        echo "<div class='alert alert-success' role='alert'>$msg</div>"; 
      }else{
        echo "<div class='alert alert-warning' role='alert'>$msg</div>"; 
      }
    }
  ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>