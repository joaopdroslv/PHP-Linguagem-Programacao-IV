<?php
$flag_msg = null;
$msg = "";

if (isset($_GET['enviar'])) {
  $A = $_GET["A"];
  $B = $_GET["B"];
  $C = $_GET["C"];

  if (
    
    !empty($A) &&  is_numeric($A) && $A > 0 

    &&

    !empty($B) &&  is_numeric($B) && $B > 0 

    &&

    !empty($C) &&  is_numeric($C) && $C > 0 
    
    ) {
    $somaAB = $A + $B;
    $somaBC = $B + $C;
    $somaCA = $C + $A;

    $flag_msg = true;
    $msg = "Cálculo realizado com sucesso! <br />";

    if ($A < $somaBC && $B < $somaCA && $C < $somaAB) {
        if (
            
            $A == $B && $B != $C && $C != $A

            &&

            $A != $B && $B == $C && $C != $A

            &&

            $A != $B && $B != $C && $C == $A
            
            ) {
            $msg .= "Este triângulo é ISÓCELES.";

        } else if ($A == $B && $B == $C && $C == $A) {
            $msg .= "Este triângulo é EQUILATERO.";
        
        } else {
            $msg .= "Este triângulo é ESCALENO.";

        }

    } else {
        $flag_msg = false;

        $msg .= "Triângulo inválido!";

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
  <title>Exercicio 09_lista01</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Descobre tipo do triângulo</h1>
  <hr class="my-3">
  <p class="lead">Esse exemplo descobre de qual tipo é um triângulo.</p>
</div>

<div class="container">
  <form method="GET">
    <div class="form-group col-md-2">
      <label for="A">Lado A:</label>
      <input type="text" class="form-control" id="A" name="A" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="B">Lado B:</label>
      <input type="text" class="form-control" id="B" name="B" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="C">Lado C:</label>
      <input type="text" class="form-control" id="C" name="C" required>
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