<?php
$flag_msg = null;
$msg = "";

if (isset($_GET['enviar'])) {
  $num = $_GET["num"];

  if (!empty($num) && is_numeric($num)) {
    $flag_msg = true; // Sucesso 

    if ($num % 2 == 0) {
        $msg = "O número informado é PAR. <br />";


    } else {
        $msg = "O número informado é IMPAR. <br />";

    }

    if ($num > 0) {
        $msg .= "O número é POSITIVO.";

    } else {
        $msg .= "O número é NEGATIVO.";

    }

  } else {
    $flag_msg = false; // Erro 
    $msg = "Dados incorretos, preencha o formulário corretamente!";
    
  }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercicio 10_lista01</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Verificar número</h1>
  <hr class="my-3">
  <p class="lead">Esse exemplo verifica se um número é par ou impar e positivo ou negativo.</p>
</div>

<div class="container">
  <form method="GET">
    <div class="form-group col-md-2">
      <label for="num">Informe um número:</label>
      <input type="text" class="form-control" id="num" name="num" required>
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