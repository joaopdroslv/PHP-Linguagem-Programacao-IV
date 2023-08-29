<?php
$flag_msg = null;
$msg = "";

if (isset($_GET['enviar'])) {
  $idade = $_GET["idade"];

  if (!empty($idade) && is_numeric($idade) && $idade > 0) {
    $flag_msg = true;

    if ($idade < 5) {
      $flag_msg = false;
      $msg = "Não se enquada em nenhum categoria!";

    } else if($idade >= 5 && $idade <= 7) {
        $msg = "O nadador se enquanda na categoria INFANTIL A";

    } else if ($idade >= 8 && $idade <= 11) {
        $msg = "O nadador se enquanda na categoria INFANTIL B";

    } else if ($idade >= 12 && $idade <= 13) {
        $msg = "O nadador se enquanda na categoria JUVENIL A";

    } else if ($idade >= 14 && $idade <= 17) {
        $msg = "O nadador se enquanda na categoria JUVENIL B";

    } else {
        $msg = "O nadador se enquadra na categoria ADULTO";

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
  <title>Exercicio 11_lista01</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Verificar categoria</h1>
  <hr class="my-3">
  <p class="lead">Esse exemplo verifica em qual categoria um nadador se enquadra.</p>
</div>

<div class="container">
  <form method="GET">
    <div class="form-group col-md-2">
      <label for="idade">Digite a idade do nadador:</label>
      <input type="text" class="form-control" id="idade" name="idade" required>
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