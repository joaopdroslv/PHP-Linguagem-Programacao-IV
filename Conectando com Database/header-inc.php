<?php
    #Inicializando a sessão
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Exemplo PHP&MySQL</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">PHP&MySQL</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contatos.php">Contatos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="compromissos.php">Compromissos</a>
            </li>
        </ul>

        <span class="navbar-text">
            <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) { ?>
                <a href="login.php" class="nav-link">Login</a>
            <?php } else { ?>
                <div class="btn-group">
                    <button 
                        class="btn btn-secondary dropdown-toggle"
                        data-toggle="dropdown" 
                        aria-haspopup="true" 
                        aria-expanded="false"
                    >
                        <?php echo htmlspecialchars($_SESSION['username']); ?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="dashboard.php" class="dropdown-item">Dashboard</a>
                        <a href="logout.php" class="dropdown-item">Logout</a>
                    </div>
                </div>
            <?php } ?>
        </span>
    </div>
</nav>
<main>
<?php 
    if (isset($_GET['msg'])) { #Manipulando mensagem de erro
        $msg = $_GET['msg'];
        $msgerror = $_GET['msgerror'];
        if ($msg == 'insert success') {
            echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso!</div>";
        } else if ($msg  == 'insert error')  { 
                echo "<div class='alert alert-danger' role='alert'>Falha ao inserir o registro! {$msgerror}</div>";
        } else if ($msg  == 'update success')  { 
                echo "<div class='alert alert-success' role='alert'>Registro atualizado com sucesso!</div>";
        } else if ($msg  == 'update error')  { 
                echo "<div class='alert alert-danger' role='alert'>Falha ao atualizar o registro! {$msgerror}</div>";
        } else if ($msg  == 'delete success')  { 
                echo "<div class='alert alert-success' role='alert'>Registro excluido com sucesso!</div>";
        } else if ($msg  == 'delete error')  { 
                echo "<div class='alert alert-danger' role='alert'>Falha ao excluir o registro! {$msgerror}</div>";
        }
    }
?>
<p>&nbsp;</p>