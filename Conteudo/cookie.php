<!--********CRIANDO COOKIE********-->
<?php
    $cookie_name = "user2";
    $cookie_value = "John Doe";
    setcookie($cookie_name, $cookie_value, time() + (60), "/") // 86400 = 1 day - 3600 = 1 hour - 60 = 1 min
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>
<body>
    <?php 
        if (!isset($_COOKIE[$cookie_name])) {
            echo "Cookie named '" . $cookie_name . "' is not set!";
        } else if ($_COOKIE[$cookie_name] == "") {
            echo "Cookie is null";
        } else {
            echo "Cookie '" . $cookie_name . "' is set!<br>";
            echo "Value is: " . $_COOKIE[$cookie_name];
        }
    ?>
</body>
</html>

<!--********APAGANDO COOKIE********-->

<?php
// Set the expiration date to one hour ago
    setcookie("user2", "", time() - 60);
    $user = $_COOKIE["user2"];
    unset($_COOKIE["user2"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        echo "Cookie ". $user . " is deleted";
        echo "<br><br>";
        if(count($_COOKIE) > 0) {
            echo "Cookies are enabled. #=" . count($_COOKIE);
        } else {
            echo "Cookies are disabled.";
        }
    ?> 
</body>
</html>