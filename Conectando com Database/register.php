<?php
    require("header-inc.php");

    require_once("connection.php");

    $username = $password = $confirm_password = "";
    $password_err = $username_err = $register_err ="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        # Validando username
        if (empty(trim($_POST['username']))) {
            $username_err = "Por favor, digite o usuário!";
        } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST['username']))) {
            # preg_match - expressão relugar para verificar caracteres inválidos
            $username_err = "Usuário pode conter apenas letras, números e underscores.";
        } else {
            $mysql_query = "SELECT count(*) as num_users FROM users WHERE username = '{$username}'";
            $result = $conn -> query($mysql_query);
            $data = mysqli_fetch_array($result);
            if ($data['num_users'] > 0) {
                $username_err = "Esse nome de usuário já está cadastrado!";
            } else {
                $username = $_POST['username'];
            }
        }

        if (empty($_POST['password'] || empty($_POST['confirm_password']))) {
            $password_err = "A senha deve possuir ao menos 6 caracteres!";
        } elseif ($_POST['password'] != $_POST['confirm_password']) {
            $password_err = "As senhas digitadas não conferem!";
        } else {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            # password_hash - criptografa a senha
            # PASSWORD_DEFAULT - padrão usado na criptografia
                # DEFAULT - é o normalmente o mais atual do PHP (depende da versão do PHP)
        }

        if (empty($username_err) && empty($password_err)) {
            $mysql_query = "INSERT INTO users (username, password) VALUES ('{$username}','{$password}')";
            $result = $conn -> query($mysql_query);

            if ($result) {
                header("Location: login.php");
            } else {
                $register_err = "Erro ao registrar usuário - Usuário não registrado!";
            }
        }
    }
    mysqli_close($conn)
?>

<div class="container-sm">
    <h2>Registro</h2>
    <p>Por favor, preencha os campos do formulário para criar a sua conta.</p>
    <hr>
    <div class="wrapper">

        <?php
            if (!empty($username_err)) {
                echo '<div class="alert alert-danger">' . $username_err . '</div>';
            } elseif (!empty($password_err)) {
                echo '<div class="alert alert-danger">' . $password_err . '</div>';
            } elseif (!empty($register_err)) {
                echo '<div class="alert alert-danger">' . $register_err . '</div>'; 
            }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Usuário:</label>
                <input type="text" name="username" class="form-control" require>
            </div>    
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" name="password" class="form-control" value="" require>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirmação da senha</label>
                <input type="password" name="confirm_password" class="form-control" value="" require>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Enviar">
                <input type="reset" class="btn btn-secondary ml-2" value="Limpar">
            </div>
            <p>Já possui uma conta? <a href="login.php">Faça o seu login aqui</a>.</p>
        </form>
    </div>    
</div>

<?php require("footer-inc.php"); ?>