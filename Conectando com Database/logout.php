<?php
    session_start();

    $_SESSION = array(); # Excluindo variáveis de sessão

    session_destroy();

    header("Location: index.php");
?>