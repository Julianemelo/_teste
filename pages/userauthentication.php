<?php
session_start();
require 'pages/conexao.php';

if((isset($_POST['cpf'])) && (isset($_POST['senha']))) {

    $cpf = mysqli_real_escape_string($conexao, $_POST ['cpf']);
    $senha = mysqli_real_escape_string($conexao, $_POST ['senha']);

    $sql = mysqli_query($conexao, "SELECT * FROM motorista WHERE cpf ='$cpf' and senha ='$senha'") or die(mysqli_error());
    $row = mysqli_num_rows($sql);
    $motorista = mysqli_fetch_assoc($sql);
    if ($row > 0) {

        $_SESSION['cpf'] = $motorista['cpf'];
        $_SESSION['modelocarro'] = $motorista['modelocarro'];
        $_SESSION['senha'] = $motorista['senha'];
        $_SESSION['id_motorista'] = $motorista['id'];
        $_SESSION['logado'] = $motorista['id'];
        $_SESSION['nome'] = $motorista['nome'];



        if ($motorista['status'] == 1) {
            //Motorista inativo -
            $_SESSION['inativo'] = "Você está inativo no momento!";
        }

        $_SESSION['success'] = "Bem Vindo de Volta ". $_SESSION['nome'];
        header("Location: painel");
    } else {
        $_SESSION['erro'] = "Hmm, parece que há algo errado!";
        header("Location: home#motor");
    }
}else{
    header("Location: home");

}



