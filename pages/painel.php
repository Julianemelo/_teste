<?php
session_start();

require_once 'seguranca.php';
require 'conexao.php';

date_default_timezone_set('America/Sao_Paulo');

$queryM = mysqli_query($conexao, "SELECT * FROM motorista WHERE id='".$_SESSION['id_motorista']."'");
$motorista = mysqli_fetch_assoc($queryM);

?>

<html>
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<title> Painel - Motorista </title>
</head>
<body>
<div class="row">
    <div class="col-md-12">
          <div class="text-info text-center">
              <h2>Área do Motorista</h2>
              <hr>
          </div>
    </div>
</div>
<div class="container theme-showcase" role="main">
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-sm btn-warning" href="logout">Sair</a> &nbsp;
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Pesquisar Corrida</button>

            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalconf">Configurações</button>

        </div>
        <div class="col-md-6">
            <?php echo date('d/m/Y')." - ". date('H:i');?>
        </div>
    </div>
<div class="row">
    <div class="col-md-12">
        <?php
         if(isset($_SESSION['erro'])){
             echo "<div class='alert alert-danger'>".$_SESSION['erro']."</div>";
             unset($_SESSION['erro']);
         }

        ?>
    </div>
    <div class="col-md-6">
        <h3 class="text-success">Olá <?php echo $motorista['nome']; ?> aqui está, seu histórico de Corridas</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Valor</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql_passg    = "SELECT * FROM corrida WHERE id_motorista='".$_SESSION['id_motorista']."'";
            $query_passg  =  mysqli_query($conexao, $sql_passg);
            $num_p        = mysqli_num_rows($query_passg);


            if($num_p >0){
            while($passg  = mysqli_fetch_assoc($query_passg)){
            ?>

            <tr>
                <td><?php echo $passg['passageiro']?></td>
                <td>R$ <?php echo $passg['valor']?></td>
            </tr>
            <?php }}else{ ?>
                 <tr>
                <td class="smal">Você não tem histórico de corridas até o momento!</td>
            </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
    <div class="col-md-6">
    <form <?php if(isset($_SESSION['inativo'])){}else{ echo "action=\"corrida\"";}?>  method="post">
        <div class="form-group text-center">
            <img style="width:100px;" src="img/taxi.png" />
        </div>
    <div class="form-group">
        <input name="nome" type="hidden" class="form-control"  value="<?php echo $motorista['nome']; ?>" placeholder="Informe o Nome">
    </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Passageiro</label>
            <select name="passageiro" <?php if(isset($_SESSION['inativo'])){echo "disabled";} ?> class="form-control">
                <?php

                $query = mysqli_query($conexao, "SELECT * FROM passageiro");


                if($num_p - mysqli_num_rows($query) != 0){
                    while($pass_r = mysqli_fetch_assoc($query)){
                ?>
                <option value="<?php echo $pass_r['id'] .",". $pass_r['nome'];?>"><?php echo $pass_r['nome'];?></option>

              <?php }

                }else{ ?>
                    <option value="">Não existem Passageiros</option>
                <?php } ?>
            </select>

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Valor</label>
            <input name="valor" type="text" <?php if(isset($_SESSION['inativo'])){echo "disabled";} ?> class="form-control"  placeholder="R$ Valor da corrida">
        </div>
        <small id="emailHelp" class="form-text text-muted text-danger"> <?php if(isset($_SESSION['inativo'])){echo "Você não pode fazer registro, pois esta inativo!";}else{ echo "Todos os  Campos são obrigatórios";} ?></small><br />

        <button type="submit" <?php if(isset($_SESSION['inativo'])){echo "disabled";} ?> class="btn btn-primary">Registrar</button>
    </form>
        <?php if(isset($_SESSION['ok'])){ echo "<div class='alert alert-success'>".$_SESSION['ok']."</div>"; unset($_SESSION['ok']); } ?>
        <?php if(isset($_SESSION['erro'])){ echo "<div class='alert alert-danger'>".$_SESSION['erro']."</div>"; unset($_SESSION['erro']); } ?>

    </div>


</div> <!-- /container -->

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pesquise por uma corrida especifica</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group text-center">
                            <img style="width:80px;" src="img/taxi.png" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome do passageiro</label>
                            <input name="busca" type="text" class="form-control"  placeholder="Infome o nome passageiro da corrida referente">
                        </div>
                        <button type="submit" class="btn btn-success">Iniciar Busca</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Agora não</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div id="modalconf" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Minhas Configurações da conta</h4>
                </div>
                <div class="modal-body">
                    <form  action="up_conta" method="post">
                        <div class="form-group text-center">
                            <img style="width:80px;" src="img/mot.png" />
                        </div>
                        <input name="motorista" type="hidden"  value="1"required>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome</label>
                            <input name="nome" type="text" class="form-control" value="<?php echo $_SESSION['nome'];?>" placeholder="Seu Nome" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">CPF</label>
                            <input name="cpf" type="text" disabled class="form-control" value="<?php echo $_SESSION['cpf'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Senha</label>
                            <input name="senha" type="text"  class="form-control"  placeholder="Sua Senha">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Modelo do Carro</label>
                            <input name="modelo" type="text"  class="form-control" value="<?php echo $_SESSION['modelocarro'];?>" placeholder="Modelo do seu carro">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status de Atividade</label>
                            <select class="form-control" name="status">
                                <option <?php if(!isset($_SESSION['inativo'])){echo "selected";} ?> value="0">Ativo</option>
                                <option  <?php if(isset($_SESSION['inativo'])){echo "selected";} ?> value="1" >Inativo</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Agora não</button>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
<?php
  if(isset($_POST['busca'])){
      //Se Houver pesquisa cai aqui
      $id = $_SESSION['id_motorista'];
      $passag = $_POST['busca'];

      $sql = mysqli_query($conexao,"SELECT * FROM corrida WHERE passageiro LIKE '%".$passag."%' ");
      $num = mysqli_num_rows($sql);


      ?>
      <div class="row">
          <div class="col-md-6">
              <h3 class="text-success">Referente a Sua Busca</h3>
            <table class="table table-striped">
              <thead>
              <tr>
                  <th>Nome</th>
                  <th>Valor</th>
              </tr>
              </thead>
              <tbody>
              <?php
            if($num >0){
              while($corrida = mysqli_fetch_assoc($sql)){
                  ?>

                  <tr>
                      <td><?php echo $corrida['passageiro']?></td>
                      <td>R$ <?php echo $corrida['valor']?></td>
                  </tr>
              <?php }}else{ ?>
                <tr>
                <td class="smal">Não foi encontrado nenhum registro com este passageiro</td>
                </tr>

           <?php } ?>

              </tbody>
          </table>
          </div>
      </div>

      <?php
      
  }
?>