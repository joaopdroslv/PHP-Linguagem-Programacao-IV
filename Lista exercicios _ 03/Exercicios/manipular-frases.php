<?php
$flag_msg = null;
$msg = "";

if (isset($_GET['enviar'])) {
  $nome = $_GET["nome"];
  $frase1 = $_GET["frase1"];
  $frase2 = $_GET["frase2"];
  $frase3 = $_GET["frase3"];

  $file_name = "{$nome}.txt";

  $file = fopen("{$file_name}", "a+");

  $frases = array();

  array_push($frases, $frase1);
  array_push($frases, $frase2);
  array_push($frases, $frase3);

  $cont = 1;
  foreach($frases as $f) {
      fwrite($file, "Frase {$cont}: {$f} \n");
      $cont++;
  }

  fclose($file);

  $file = fopen("{$file_name}", "r");

  $conteudo = fread($file, filesize($file_name));

  $msg = "As frases foram salvas no arquivo! <br/><br/>";

  $msg .= "Apresentando as mensagem salvas: <br/><br/>";

  $msg .= $conteudo;

  $flag_msg = true;

  fclose($file);
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercicio 01_lista03</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Receber/armazenar/imprimir frases</h1>
  <hr class="my-3">
  <p class="lead">Esse exemplo recebe 3 frases digitadas, as guarda e depois exibe.</p>
</div>

<div class="container">
  <form method="GET">
    <div class="form-group col-md-2">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" id="nome" name="nome" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="frase1">Frase 1:</label>
      <input type="text" class="form-control" id="frase1" name="frase1" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="frase2">Frase 2:</label>
      <input type="text" class="form-control" id="frase2" name="frase2" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="frase3">Frase 3:</label>
      <input type="text" class="form-control" id="frase3" name="frase3" required>
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