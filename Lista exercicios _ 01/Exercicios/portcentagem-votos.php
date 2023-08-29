<?php
$flag_msg = null;
$msg = "";

if (isset($_GET['enviar'])) {
  $votosValidos = $_GET["votosValidos"];
  $votosNulos = $_GET["votosNulos"];
  $votosBrancos = $_GET["votosBrancos"];

  if (
    
    !empty($votosValidos) &&  is_numeric($votosValidos) && $votosValidos >= 0 

    &&

    !empty($votosNulos) &&  is_numeric($votosNulos) && $votosNulos >= 0 

    &&

    !empty($votosBrancos) &&  is_numeric($votosBrancos) && $votosBrancos >= 0 
    
    ) {
    $total = $votosValidos + $votosNulos + $votosBrancos;
    $porcValidos = ($votosValidos / $total) * 100;
    $porcNulos = ($votosNulos / $total) * 100;
    $porcBrancos = ($votosBrancos / $total) * 100;

    $flag_msg = true; // Sucesso 

    // Concatenando string
    $msg = "Cálculo realizado com sucesso: <br />";
    $msg .= "Votos válidos representam (em porcentagem): ";
    $msg .= number_format($porcValidos,2);
    $msg .= "<br />Votos nulos representam (em porcentagem): ";
    $msg .= number_format($porcNulos,2);
    $msg .= "<br />Votos brancos representam (em porcentagem): ";
    $msg .= number_format($porcBrancos,2);

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
  <title>Exercicio 07_lista01</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Cálculo de votos</h1>
  <hr class="my-3">
  <p class="lead">Esse exemplo cálcula a porcentagem de votos em uma votação.</p>
</div>

<div class="container">
  <form method="GET">
    <div class="form-group col-md-2">
      <label for="votosValidos">Informe a quantidade de votos válidos:</label>
      <input type="text" class="form-control" id="votosValidos" name="votosValidos" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="votosNulos">Informe a quantidade de votos nulos:</label>
      <input type="text" class="form-control" id="votosNulos" name="votosNulos" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="votosBrancos">Informe a quantidade de votos brancos:</label>
      <input type="text" class="form-control" id="votosBrancos" name="votosBrancos" required>
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