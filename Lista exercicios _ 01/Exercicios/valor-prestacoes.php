<?php
$flag_msg = null;
$msg = "";

if (isset($_GET['enviar'])) {
  $valor = $_GET["valor"];
  $qtdePrestacoes = $_GET["qtdePrestacoes"];

  if (
    
    !empty($valor) &&  is_numeric($valor) && $valor >= 0 

    &&

    !empty($qtdePrestacoes) &&  is_numeric($qtdePrestacoes) && $qtdePrestacoes >= 0 
    
    ) {
    $valorParcela = $valor / $qtdePrestacoes;

    $flag_msg = true; // Sucesso 

    // Concatenando string
    $msg = "Cálculo realizado com sucesso:<br />";
    $msg .= "Você pagará ";
    $msg .= number_format($qtdePrestacoes);
    $msg .= " parcelas de ";
    $msg .= number_format($valorParcela);
    $msg .= " reais.";

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
  <title>Exercicio 08_lista01</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Cálculo de prestações</h1>
  <hr class="my-3">
  <p class="lead">Esse exemplo cálcula o valor das prestações.</p>
</div>

<div class="container">
  <form method="GET">
    <div class="form-group col-md-2">
      <label for="valor">Informe o valor do produto:</label>
      <input type="text" class="form-control" id="valor" name="valor" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="qtdePrestacoes">Informe a quantidade de prestações que deseja:</label>
      <input type="text" class="form-control" id="qtdePrestacoes" name="qtdePrestacoes" required>
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