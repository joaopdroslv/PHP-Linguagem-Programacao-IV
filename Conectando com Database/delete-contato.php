<?php
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
        header("Location: login.php");
    }

    #Deletando de uma tabela
    if (isset($_GET['id'])) {
        #Pegando id a ser excluído
        $id = $_GET['id'];

        #Chamando conexão
        require_once('connection.php');

        #Criando minha Query
        $mysql_query = "DELETE FROM contatos WHERE id={$id}";

        #Executando Query no IF e verificando se deu certo
        if ($conn -> query($mysql_query) === TRUE) { 
            $msg = "delete success";
            $msgerror= "";
        } else {
            $msg = "delete error";
            $msgerror = $conn -> error;
        }

        mysqli_close($conn);
    } else { #Tratando caso o ID não for informado
        $msg = "delete error";
        $msgerror = "O ID não foi informado!";
    }

    header("Location: contatos.php?msg={$msg}&msgerror={$msgerror}");
?>