<!--********INICIAR A SESSÃO********-->
<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<body>
<?php
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "Session variables are set.";
?>
</body>
</html>

<!--********USAR VARIAVEIS DA SESSÃO********-->
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>
<?php
// Echo session variables that were set on previous page
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
?>
</body>
</html>

<!--********MODIFICANDO VARIAVEIS DA SESSÃO********-->
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>
<?php
// To change a session variable, just overwrite it
$_SESSION["favcolor"] = "yellow";
print_r($_SESSION);
?>
</body>
</html>

<!--********FINALIZAR A SESSÃO********-->
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>
<?php
// Remove all session variables
session_unset();

// Destroy the session
session_destroy();
?>
</body>
</html>

<!--********EXEMPLO********-->
<?php
session_start(); 

echo "Cor: " . $_SESSION["favcolor"];
echo "<br>";
echo "Animal: " . $_SESSION["favanimal"];
?>

<!DOCTYPE html>
<html>
<body>
    <?php
        echo "<hr>";
        print_r($_SESSION);
        echo "<hr>";
        // Remove all session variables
        session_unset();
        print_r($_SESSION);
        echo "<hr>";
        // Destroy the session
        session_destroy();
        print_r($_SESSION);
    ?>
</body>
</html>