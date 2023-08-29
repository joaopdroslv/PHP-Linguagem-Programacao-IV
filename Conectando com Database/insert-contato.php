<?php
	require("header-inc.php");

	if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
		header("Location: login.php");
	}

	#Inserindo em uma tabela
	if (isset($_POST['enviar'])) { 
		#Pegando variáveis
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$datanasc = $_POST['datanasc'];

		#Interessante verificar se os valores foram preenchidos

		#Chamando conexão
		require_once('connection.php');

		#Criando minha Query
		$mysql_query = "INSERT INTO contatos (nome, email, datanasc) 
							VALUES ('{$nome}', '{$email}', '{$datanasc}')";

		#Executando minha Query
		$result = $conn -> query($mysql_query);

		if ($result === true) { #Verificar se deu certo
			$msg = "insert success"; #Setando mensagem de sucesso
			$msgerror = "";
		}
		else {
			$msg = "insert error"; #Setando mensagem de erro
			$msgerror = $conn -> error;
		}

		#Fechando conexão
		#Importante fechar conexão pois o banco possui limite de conexões simultâneas
		mysqli_close($conn);

		#Redirecionar a "contatos.php"
		header("Location: contatos.php?msg={$msg}&msgerror={$msgerror}");
	}
?>

<div class="container">
	<h2>Contatos</h2>
  	<p>Cadastro de contatos.</p>
  	<hr>  	
	<div class="wrapper">
		<form method="post">
			<label for="name">&nbsp;Nome</label>
			<input type="text" name="nome" id="nome" class="form-control" required><br>
			<label for="email">&nbsp;E-Mail</label>
			<input type="text" name="email" id="email" class="form-control"required><br>
			<label for="datanasc">&nbsp;Data de Nascimento</label>
			<input type="date" name="datanasc" id="datanasc" class="form-control" style="width: 200px;"><br>
			<input type="submit" name="enviar" value="Inserir" class="btn btn-primary w100">
		</form>
	</div>
</div>

<?php require("footer-inc.php"); ?>