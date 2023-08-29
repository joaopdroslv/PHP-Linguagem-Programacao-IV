<?php
$flag_msg = null;
$msg = "";

if (isset($_GET['enviar'])) {
  $nota1 = $_GET["nota1"];
  $nota2 = $_GET["nota2"];
  $nota3 = $_GET["nota3"];
  $nota4 = $_GET["nota4"];

  $soma = $nota1 + $nota2 + $nota3 + $nota4;
  $media = $soma / 4;

  if ($media >= 7) {
    $flag_msg = true; // Sucesso 

    // oncatenando string
    $msg = "<br />Sua média é: "; 
    $msg .= number_format($media,2);
    $msg .= " você foi APROVADO."; 

  } else {
    $flag_msg = false; // Erro 
    $msg = "<br />Sua média é: ";
    $msg .= number_format($media,2);
    $msg .= " você foi REPROVADO";
    
  }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercicio 05_lista01</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Cálculo média aritmética</h1>
  <hr class="my-3">
  <p class="lead">Esse exemplo cálcula a média aritmética de 4 notas de um aluno.</p>
</div>

<div class="container">
  <form method="GET">
    <div class="form-group col-md-2">
      <label for="nota1">Informe a nota 1:</label>
      <input type="text" class="form-control" id="nota1" name="nota1" required>
    </div>
    <div class="form-group col-md-2">
      <label for="nota2">Informe a nota 2:</label>
      <input type="text" class="form-control" id="nota2" name="nota2" required>
    </div>
    <div class="form-group col-md-2">
      <label for="nota3">Informe a nota 3:</label>
      <input type="text" class="form-control" id="nota3" name="nota3" required>
    </div>
    <div class="form-group col-md-2">
      <label for="nota4">Informe a nota 4:</label>
      <input type="text" class="form-control" id="nota4" name="nota4" required>
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