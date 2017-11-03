<?php
session_start();
require_once 'seguranca.php';
require 'conexao.php';

date_default_timezone_set('America/Sao_Paulo');

$queryM = mysqli_query($conexao, "SELECT * FROM passageiro WHERE id='".$_SESSION['id_passageiro']."'");
$passageiro = mysqli_fetch_assoc($queryM);

?>

    <html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="pages/font-awesome/css/font-awesome.css">

        <link rel="stylesheet" href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <title> Painel - passageiro </title>
    </head>
    <body>
    <div class="row">
        <div class="col-md-12">
            <div class="text-info text-center">
                <h2>Área do passageiro</h2>
                <hr>
            </div>
        </div>
    </div>
    <div class="container theme-showcase" role="main">
        <div class="row">
            <?php if(isset($_SESSION['success'])){
                echo "<div style='z-index:9999;' class='alert alert-success'>".$_SESSION['success']."</div>";
                unset($_SESSION['success']);
            } ?>
            <div class="col-md-12">
                <a class="btn btn-sm btn-warning" href="logout">Sair</a>
            </div>
            <div class="col-md-6">
                <h3 class="text-success">Olá <?php

                    $explode = explode(' ',$passageiro['nome']);
                    $nome_p  = $explode[0];
                    echo $nome_p; ?> aqui está, seu histórico de Corridas</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nome Mot.</th>
                        <th>Valor</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $sql_passg    = "SELECT * FROM corrida WHERE id_passageiro='".$_SESSION['id_passageiro']."'";
                    $query_passg  =  mysqli_query($conexao, $sql_passg);
                    $num_p        = mysqli_num_rows($query_passg);


                    if($num_p >0){
                        while($passg  = mysqli_fetch_assoc($query_passg)){
                            ?>

                            <tr>
                                <td><?php echo $passg['nome']?></td>
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

                <form action="" method="post">
                    <div class="form-group text-center">
                        <img style="width:80px;" src="img/taxi.png" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome do Motorista</label>
                        <input name="busca" type="text" class="form-control"  placeholder="Infome o nome passageiro da corrida referente" required>
                    </div>
                    <button type="submit" class="btn btn-success">Iniciar Busca</button>
                </form>
            </div>
        </div>

<?php
if(isset($_POST['busca'])){
    //Se Houver pesquisa cai aqui
    $id = $_SESSION['id_passageiro'];
    $passag = $_POST['busca'];

    $sql = mysqli_query($conexao,"SELECT * FROM corrida WHERE nome LIKE '%".$passag."%' AND id_passageiro='$id'");
    $num = mysqli_num_rows($sql);


    ?>
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-success">Referente a Sua Busca</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nome Mot.</th>
                    <th>Valor</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if($num >0){
                    while($corrida = mysqli_fetch_assoc($sql)){
                        ?>

                        <tr>
                            <td><?php echo $corrida['nome']?></td>
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
    </div>
    </body>

    </html>
    <?php } ?>