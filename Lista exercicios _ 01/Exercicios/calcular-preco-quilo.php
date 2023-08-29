<?php
$flag_msg = null;
$msg = "";

if (isset($_GET['enviar'])) {
  $quilo = $_GET["quilo"];
  $qtde = $_GET["qtde"];

  if (!empty($quilo) && !empty($qtde) && is_numeric($quilo) && is_numeric($qtde) && $quilo > 0 && $qtde > 0) {
    $total = $qtde * $quilo;

    $flag_msg = true; // Sucesso 

    // Concatenando string
    $msg = "Cálculo efetuado com sucesso:<br />Preço por quilo: "; 
    $msg .= number_format($quilo,2);
    $msg .= "<br />Quantidade em quilos: "; 
    $msg .= number_format($qtde,2);
    $msg .= "<br />Total: ";
    $msg .= number_format($total,2);

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
  <title>Exercicio 02_lista01</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Cálculo de valor</h1>
  <hr class="my-3">
  <p class="lead">Esse exemplo calcula o valor a ser pago com base no preço por quilo.</p>
</div>

<div class="container">
  <form method="GET">
    <div class="form-group col-md-2">
      <label for="quilo">Preço por quilo:</label>
      <input type="text" class="form-control" id="quilo" name="quilo" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="qtde">Quantidade em quilos:</label>
      <input type="text" class="form-control" id="qtde" name="qtde" required>
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