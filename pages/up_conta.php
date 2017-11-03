<?php
session_start();
require 'pages/conexao.php';
if(isset($_POST['motorista'])){

    $nome    = mysqli_real_escape_string($conexao, $_POST ['nome']);
    $senha   = mysqli_real_escape_string($conexao, $_POST ['senha']);
    $modelo  = mysqli_real_escape_string($conexao, $_POST ['modelo']);
    $status  = mysqli_real_escape_string($conexao, $_POST ['status']);

    if(empty($senha)){
        //Não alterou a senha
        $sql = mysqli_query($conexao, "UPDATE motorista SET nome='$nome',modelocarro='$modelo',status='$status'");
    }else{
        //Alterou a senha
        $sql = mysqli_query($conexao, "UPDATE motorista SET nome='$nome',senha='$senha',modelocarro='$modelo',status='$status'");
    }

    if ($sql == true) {
        session_destroy();

        session_start();
        $_SESSION['edit'] = "1";
        header("Location: home#login");
    } else {
        $_SESSION['erro'] = "Hmm, parece que há algo errado!";
        header("Location: painel");
    }
}else{
    header("Location: painel");

}


