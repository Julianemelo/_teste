<html>
<head>
<title> Cadastrando </title>
</head>
<body>
<?php
$host = "localhost";
$user = "root";
$pass ="";
$banco="cadastro";
$conexao = @mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($banco) or die(mysql_error());
?>
<?php
$nome=$_POST['nome'];
$datanasc=$_POST['datanasc'];
$cpf=$_POST['cpf'];
$modelocarro=$_POST['modelocarro'];
$status=$_POST['status'];
$sexo=$_POST['sexo'];
$senha=$_POST['senha'];
$sql = mysql_query ("INSERT INTO motorista(nome, datanasc, cpf, modelocarro, status, sexo, senha)
VALUES('$nome', '$datanasc','$cpf','$modelocarro','$status','$sexo', '$senha')");
echo "Cadastro efetuado com sucesso!";
?>

</body>
</html>