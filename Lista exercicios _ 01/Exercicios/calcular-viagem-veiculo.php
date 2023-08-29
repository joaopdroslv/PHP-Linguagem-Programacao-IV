<?php
$flag_msg = null;
$msg = "";

if (isset($_GET['enviar'])) {
  $kmInicial = $_GET["kmInicial"];
  $kmFinal = $_GET["kmFinal"];
  $qtdeLitros = $_GET["qtdeLitros"];
  $precoLitro = $_GET["precoLitro"];

  if (
    
    !empty($kmInicial) && is_numeric($kmInicial) && $kmInicial > 0

    &&

    !empty($kmFinal) && is_numeric($kmFinal) && $kmFinal > $kmInicial

    &&

    !empty($qtdeLitros) && is_numeric($qtdeLitros) && $qtdeLitros > 0

    &&

    !empty($precoLitro) && is_numeric($precoLitro) && $precoLitro > 0
  
  ) {
    $kmPercorrido = $kmFinal - $kmInicial;
    $consumoPorKm = $kmPercorrido / $qtdeLitros;
    $custoTotal = $qtdeLitros * $precoLitro;

    $flag_msg = true; // Sucesso

    $msg = "Cálculo realizado com sucesso! <br />";
    $msg .= "A distância percorrida em kms foi: ";
    $msg .= number_format($kmPercorrido,2);
    $msg .= "<br />O veículo percorreu: ";
    $msg .= number_format($consumoPorKm,2);
    $msg .= " km por litro.<br />";
    $msg .= "O custo total da viagem foi de: ";
    $msg .= number_format($custoTotal,2);
    $msg .= " reais.";

  } else {
    $flag_msg = false;
    $msg = "Os dados digitados estão incorretos, por favor tente novamente!";

  }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercicio 06_lista01</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Cálculo de uma viagem</h1>
  <hr class="my-3">
  <p class="lead">Esse exemplo a a quilometragem percorrida, consumo de um veiculo e valor total de uma viagem.</p>
</div>

<div class="container">
  <form method="GET">
    <div class="form-group col-md-2">
      <label for="kmInicial">Informe a quilometragem inicial:</label>
      <input type="text" class="form-control" id="kmInicial" name="kmInicial" required>
    </div>
    <div class="form-group col-md-2">
      <label for="kmFinal">Informe a quilometragem final:</label>
      <input type="text" class="form-control" id="kmFinal" name="kmFinal" required>
    </div>
    <div class="form-group col-md-2">
      <label for="qtdeLitros">Informe a quantidade de litros consumidos:</label>
      <input type="text" class="form-control" id="qtdeLitros" name="qtdeLitros" required>
    </div>
    <div class="form-group col-md-2">
      <label for="precoLitro">Informe o preço do litro do combustivel:</label>
      <input type="text" class="form-control" id="precoLitro" name="precoLitro" required>
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