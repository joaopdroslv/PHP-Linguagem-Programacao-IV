<?php
	require("header-inc.php");

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
        header("Location: login.php");
    }

    require_once('connection.php');

    #Inserindo compromisso no banco
    if (isset($_POST['enviar'])) {
        $descricao = $_POST['descricao'];
        $data_inicio = $_POST['data_inicio'];
        $duracao = $_POST['duracao'];
        $idcontato = $_POST['idcontato'];

        $mysql_query = "INSERT INTO compromissos (descricao, data_inicio, duracao, idcontato)
                            VALUES ('{$descricao}', '{$data_inicio}', '{$duracao}', '{$idcontato}')";
    
        $result = $conn -> query($mysql_query);

        if ($result === true) {
			$msg = "insert success";
			$msgerror = "";
		}
		else {
			$msg = "insert error"; 
			$msgerror = $conn -> error;
		}

		mysqli_close($conn);

        header("Location: compromissos.php?msg={$msg}&msgerror={$msgerror}");
    } else {
        #Else por que a primeira vez que o usuário entrar 
        #ele ainda não terá clicado em submit, então entrará aqui primeiro.

        #Buscar contatos no banco para exibir no select
        $mysql_query = "SELECT * FROM contatos ORDER BY nome";
        $result_contato = $conn -> query($mysql_query); #result

        mysqli_close($conn);
    }
?>

<div class="container">
	<h2>Compromissos</h2>
  	<p>Cadastro de compromissos.</p>
  	<hr>  	
	<div class="wrapper">
		<form method="post">
			<label for="descricao">&nbsp;Descrição</label>
			<input type="text" name="descricao" id="descricao" class="form-control" required><br>
			<label for="data_inicio">&nbsp;Início</label>
			<input type="date" name="data_inicio" id="data_inicio" class="form-control"required><br>
			<label for="duracao">&nbsp;Duração (em minutos)</label>
			<input type="text" name="duracao" id="duracao" class="form-control" style="width: 200px;"><br>
            <label for="idcontato">&nbsp;Contato</label>
			<select name="idcontato" id="idcontato" class="form-control" style="width: 200px;">
                <option selected>...</option>
                <?php while($contatos = mysqli_fetch_array($result_contato, MYSQLI_ASSOC)) { ?>
                    <!-- 
                        $result - retorna um colection (array bidimensional)
                        mysqli_fetch_array() - percorrerá linha por linha dessa colection
                     -->
                    <option value="<?= $contatos['id'] ?>"><?= $contatos['nome'] ?></option>
                <?php } ?>
            </select><br>
			<input type="submit" name="enviar" value="Inserir" class="btn btn-primary w100">
		</form>
	</div>
</div>

<?php require("footer-inc.php"); ?>