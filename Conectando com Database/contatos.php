<?php
  require("header-inc.php");

  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("Location: login.php");
  }

  #Chamando conexão
  require_once('connection.php');

  #Criando minha Query
  $mysql_query = "SELECT * FROM contatos ORDER BY id";

  #Executando minha Query
  $result = $conn -> query($mysql_query); #Retorna um array assossiativo
?> 

<div class="container">
  <h2>Contatos</h2>
  <p>Listagem do contatos cadastrados.</p>
  <hr>
  <div class="float-right p-1">
    <a href="insert-contato.php"><button type="button" class="btn btn-primary">Novo</button></a>
  </div>
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr class="table-info" style="text-align:center">
        <th scope="col" style="width: 5%;">#</th>
        <th scope="col">Nome</th>
        <th scope="col" style="width: 30%;">E-Mail</th>
        <th scope="col" style="width: 15%;">Data Nascimento</th>
        <th scope="col" style="width: 20%;">Ação</th>
      </tr>
    </thead>
    <tbody>
      <?php while($data = mysqli_fetch_array($result)) { ?>
        <tr> 
          <td scope="row" style="text-align:center"><? $data['id'] ?></td>
          <td style="text-align:center"><?= $data['nome'] ?></td> 
          <td style="text-align:center"><? $data['email'] ?></td> 
          <td style="text-align:center"><?php echo date('d/m/Y', strtotime($data['datanasc'])); ?></td>
          <td style="text-align:center">
            <a href="update-contato.php?id=<?= $data['id'] ?>">
            <!--Passar parametro no PHP: ?nomedoparametro=conteúdo do parametro-->
              <button type="button" class="btn btn-primary">Editar</button></a>
            <a href="delete-contato.php?id=<?= $data['id'] ?>">
              <button type="button" class="btn btn-danger">Excluir</button></a>
          </td> 
        </tr> 
      <?php } ?>   
    </tbody>
  </table>
</div>

<?php require("footer-inc.php"); ?>