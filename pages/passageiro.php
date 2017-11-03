<?php
session_start();
require 'pages/conexao.php';

if(isset($_POST['nome'])) {

    if($_POST['senha'] == $_POST['senha1']) {

        $nome           = $_POST['nome'];
        $datanasc       = $_POST['datanasc'];
        $cpf            = $_POST['cpf'];
        $modelocarro    = $_POST['modelocarro'];
        $sexo           = $_POST['sexo'];
        $senha          = $_POST['senha'];


        $sql = mysqli_query($conexao, "INSERT INTO passageiro(nome, datanasc, cpf, sexo, senha) VALUES('$nome', '$datanasc','$cpf','$sexo','$senha')");
        $_SESSION['okp'] = "Cadastro realizado com sucesso! Faça login";
        header('Location: home#login');


    }else{
        $_SESSION['passDiferente'] = "As senhas digitadas são diferentes";
        header('Location: home#meioformM');
    }

}else{
    header('Location: home');
}