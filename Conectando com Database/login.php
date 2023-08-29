<?php
    require("header-inc.php");

    require_once("connection.php");

    $username = $password = $login_err = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $login_err = "Usuário ou senha inválidos!";
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $mysql_query = "SELECT id, username, password FROM users WHERE username = '{$username}'";
            $result = $conn -> query($mysql_query);
            if (!$result) {
                $login_err = "Usuário não encontrado!";
            } else {
                $data = mysqli_fetch_array($result);
                if (password_verify($password, $data['password'])) {
                    # password_verify() é uma função do PHP para comparar senhas ou hashs
                    session_start();
                    # Crio 3 variáveis de sessão
                    $_SESSION['loggedin'] = true;
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['username'] = $username;
                    header("Location: dashboard.php");
                } else {
                    $login_err = "Usuário ou senha incorretos!";
                }
            }
        }
    }
    mysqli_close($conn);
?>

<div class="container-sm">
    <h2>Login</h2>
    <p>Por favor, entre com os seus dados de login.</p>
    <hr>
    <div class="wrapper">

        <?php
            if (!empty($login_err)) {
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }
        ?>

        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Usuário:</label>
                <input type="text" name="username" class="form-control" require>
            </div>    
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" name="password" class="form-control" require>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Não possui uma conta? <a href="register.php">Registre-se agora</a>.</p>
        </form>
    </div>
</div>

<?php require("footer-inc.php"); ?>