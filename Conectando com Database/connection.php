<?php
    #Criar conexão com a Database

    #Definindo constantes
    define ('DB_HOST', 'localhost'); #Define servidor
    define ('DB_USER', 'root'); #Define usuário
    define ('DB_PASSWORD', ''); #Define senha do banco
    define ('DB_NAME', 'agenda'); #Define qual Database usar

    #Criando conexão
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    #Testar conexão
    if(!$conn) {
        die('Falhou a conexão com o banco de dados MySQL: ' . mysqli_connect_errno());
        exit;
    }
    
    #echo "Conexão bem sucessedida!";
?>