<?php
  if (isset($_GET['enviar'])) {
      $nome = $_GET["nome"];
      $tipo = $_GET["tipo"];
      $livro = $_GET["livro"];

      $dia = date("d") - 1; // Ajustar dia

      $data = date("{$dia}/m/Y h:i"); // Monto a data antes de alterar o dia

      //Obs: Não ajustei a hora!

      // Verificando o tipo para alterar o dia
      if ($tipo == "professor") {
          $dia = $dia + 10;
      } else if ($tipo == "aluno" || $tipo == "funcionario") {
          $dia = $dia + 5;
      }

      $data_entrega = date("{$dia}/m/Y"); // Monto a data com o dia alterado

      $file = fopen("emprestimos.txt", "a");

      $texto = 
      
      "BIBLIOTECA FATEC/PP - {$data}
                  
      Nome: {$nome}
      Tipo de usuário: {$tipo}
      Livro retirado: {$livro}
              
      Data de devolução {$data_entrega}
              
      --------------------------
      
      ";

      fwrite($file, $texto);

      fclose($file);
  }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>p1 exerc03</title>
</head>
<body>
<div>
  <h1>Sistema de empréstimo de livros!</h1>
  <hr>
  <p>Esse sistema irá registrar dados a respeito do empréstimo de livros.</p>
</div>
<div>
  <form method="GET">
    <div>
      <label for="nome">Nome do usuário:</label>
      <input type="text" id="nome" name="nome" required>
    </div>
    <br />
    <div>
      <label for="tipo">Tipo do usuário:</label>
      <input type="text" id="tipo" name="tipo" required>
    </div>
    <br />
    <div >
      <label for="livro">Nome do livro:</label>
      <input type="text" id="livro" name="livro" required>
    </div>
    <br />
    <button type="submit"  name="enviar">Enviar</button>
    <button type="button" name="limpar">Limpar</button>
  </form>
</div>
</body>
</html>