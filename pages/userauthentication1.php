<?php
session_start();
require 'pages/conexao.php';
if((isset($_POST['cpf'])) && (isset($_POST['senha']))){
    $cpf = mysqli_real_escape_string($conexao, $_POST ['cpf']);
    $senha = mysqli_real_escape_string($conexao, $_POST ['senha']);
    $sql = mysqli_query($conexao, "SELECT * FROM passageiro WHERE cpf ='$cpf' and senha ='$senha'") or die(mysqli_error());
    $row = mysqli_num_rows($sql);
    $passageiro = mysqli_fetch_assoc($sql);
    if ($row > 0) {
        session_start();
        $_SESSION['cpf'] = $passageiro['cpf'];
        $_SESSION['senha'] = $passageiro['senha'];
        $_SESSION['id_passageiro'] = $passageiro['id'];
        $_SESSION['logado'] = $passageiro['id'];
        $_SESSION['nome'] = $passageiro['nome'];


        $_SESSION['success'] = "Bem Vindo de Volta ". $_SESSION['nome'];
        header("Location: painelpassageiro");
    } else {
        $_SESSION['erroPassageiro'] = "Hmm, parece que há algo errado!";
        header("Location: home#passg");
    }
}else{
    header("Location: home");

}


