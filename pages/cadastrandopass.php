<?php
require  'pages/conexao.php';
?>
<html>
<head>
    <title> Cadastrando </title>
</head>
<body>

<?php
$nome=$_POST['nome'];
$datanasc=$_POST['datanasc'];
$cpf=$_POST['cpf'];
$sexo=$_POST['sexo'];
$senha=$_POST['senha'];
$sql = mysqli_query ($conexao,"INSERT INTO passageiro(nome, datanasc, cpf, sexo, senha)
VALUES('$nome', '$datanasc','$cpf', '$sexo', '$senha')");
echo "Cadastro efetuado com sucesso!";
?>
</body>
</html>