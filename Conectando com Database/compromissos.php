<?php
  require("header-inc.php");

  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("Location: login.php");
  }

  require_once('connection.php');

  #Ao usar * quando envolve 2 tabelas, é retornado todos os dados de ambas as tabelas
  $mysql_query = "SELECT cmp.id comp_id, 
                      cmp.descricao descricao, 
                      cmp.data_inicio data_inicio, 
                      cmp.duracao duracao,
                      cnt.nome cont_nome
                      FROM contatos cnt, compromissos cmp 
                      WHERE cmp.idcontato = cnt.id ORDER BY cmp.id";

  $result = $conn -> query($mysql_query);

  mysqli_close($conn);
?>

<div class="container">
  <h2>Compromissos</h2>
  <p>Listagem do compromissos cadastrados.</p>
  <hr>
  <div class="float-right p-1">
    <a href="insert-compromissos.php"><button type="button" class="btn btn-primary">Novo</button></a>
  </div>
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr class="table-info" style="text-align:center">
        <th scope="col" style="width: 5%; ">#</th>
        <th scope="col" style="width: 40%;">Descrição</th>
        <th scope="col" style="width: 8%; ">Data Início</th>
        <th scope="col" style="width: 8%; ">Duração</th>
        <th scope="col" style="width: 20%;">Contato</th>
        <th scope="col" style="width: 20%;">Ação</th>
      </tr>
    </thead>
    <tbody>
      <?php while($data = mysqli_fetch_array($result)) { ?>
        <tr> 
          <td scope="row" style="text-align:center"><?= $data['comp_id'] ?></td>
          <td style="text-align:center"><?= $data['descricao'] ?></td> 
          <td style="text-align:center"><?php echo date('d/m/Y', strtotime($data['data_inicio'])); ?></td>
          <td style="text-align:center"><?= $data['duracao']; ?></td> 
          <td style="text-align:center"><?= $data['cont_nome']; ?></td> 
          <td style="text-align:center">
            <a href="update-compromissos.php?id=<?= $data['comp_id'] ?>">
            <!--Passar parametro no PHP: ?nomedoparametro = conteúdo do parametro-->
              <button type="button" class="btn btn-primary">Editar</button></a>
            <a href="delete-compromissos.php?id=<?= $data['comp_id'] ?>">
              <button type="button" class="btn btn-danger">Excluir</button></a>
          </td> 
        </tr> 
      <?php } ?>   
    </tbody>
  </table>
</div>

<?php require("footer-inc.php"); ?>