<?php
  require("header-inc.php");

  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("Location: login.php");
  }
?>

<div class="container">
  <h2>Dashboard</h2>
  <p>Olá, <b><?php echo $_SESSION['username']; ?></b>. Bemvindo ao nosso site.</p>
  <hr />  
  <br />
  <p>
    <a href="reset-password.php" class="btn btn-warning">Resete a sua senha</a>
    <a href="logout.php" class="btn btn-danger ml-3">Faça logout em sua conta</a>
  </p>
</div>

<?php require("footer-inc.php"); ?>