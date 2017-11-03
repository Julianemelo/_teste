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


        $sql = mysqli_query($conexao, "INSERT INTO motorista(nome, datanasc, cpf, modelocarro, sexo, senha) VALUES('$nome', '$datanasc','$cpf','$modelocarro','$sexo', '$senha')");
        $_SESSION['okm'] = "Cadastro realizado com sucesso! Faça login";
        header('Location: home#motor');


    }else{
        $_SESSION['passDiferente'] = "As senhas digitadas são diferentes";
        header('Location: home#meioformM');
    }

}else{
    header('Location: home');
}