<?php
session_start();
//Conexão
require 'conexao.php';


//Recebendo dados e cadastrando
$nome           =$_POST['nome'];
$passageiro     =$_POST['passageiro'];
$explode = explode(',',$passageiro); // Dividindo as informações so Selct
$id_passageiro   = $explode[0];               //Pegando a Primeira parte da divisã , dentro de um array
$passageiro_nome = $explode[1];               //Pegando a Segunda parte da divisã , dentro de um array


$valor          =$_POST['valor'];
$id_m           = $_SESSION['id_motorista'];

if(mysqli_query($conexao,"INSERT INTO corrida(nome, passageiro, valor,id_motorista,id_passageiro) VALUES ('$nome', '$passageiro_nome','$valor','$id_m','$id_passageiro')")){

$_SESSION['ok'] = "Cadastrado com sucesso!";
header('Location: painel');


}else{
    $_SESSION['erro'] = "Oops! Houve algum erro";
    header('Location: painel');
}



?>

</body>
</html>