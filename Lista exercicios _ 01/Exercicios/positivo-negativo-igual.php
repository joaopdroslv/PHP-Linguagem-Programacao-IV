<?php
$flag_msg = null;
$msg = "";

if (isset($_GET['enviar'])) {
  $val = $_GET["val"];

  if (!empty($val) && is_numeric($val) && $val > 0) {
    $flag_msg = true; // Sucesso 

    // Concatenando string
    $msg = "Comparação efetuada com sucesso:<br />O valor digitado: "; 
    $msg .= number_format($val,2);
    $msg .= " é positivo."; 

  } else if (!empty($val) && is_numeric($val) && $val < 0) {
    $flag_msg = true;
    $msg = "Comparação efetuada com sucesso:<br />O valor digitado: "; 
    $msg .= number_format($val,2);
    $msg .= " é negativo."; 

  } else if (!empty($val) && is_numeric($val) && $val == 0) {
    $flag_msg = true;
    $msg = "Comparação efetuada com sucesso:<br />O valor digitado: "; 
    $msg .= number_format($val,2);
    $msg .= " é igual a zero.";    

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
  <title>Exercicio 04_lista01</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Validando número</h1>
  <hr class="my-3">
  <p class="lead">Esse exemplo compara se um número é positivo, negativo ou igual a 0.</p>
</div>

<div class="container">
  <form method="GET">
    <div class="form-group col-md-2">
      <label for="val">Digite um valor:</label>
      <input type="text" class="form-control" id="val" name="val" required>
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