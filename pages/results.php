<?php
$host = "localhost";
$user = "root";
$pass ="";
$banco ="cadastro";
$conexao = @mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($banco) or die(mysql_error());
?>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php
$buscar=$_POST['buscar'];
$sql =mysql_query("SELECT * from corrida WHERE nome LIKE '%".$buscar."%'");
$row = mysql_num_rows ($sql);
if ($row > 0){
	while($linha = mysql_fetch_array ($sql)){
		$nome = $linha ['nome'];
		$passageiro = $linha ['passageiro'];
		$valor = $linha ['valor'];
		/**
		$modelocarro = $linha ['modelocarro'];
		$status = $linha ['status'];
		$sexo = $linha ['sexo'];
         */
		echo "<strong>Nome:</strong>" .@$nome;
		echo "<br/> <br/>";
		echo "<strong>Passageiro:</strong>" .@$passageiro;
		echo "<br/> <br/>";
		echo "<strong>Valor:</strong>" .@$valor;
		/**echo "<br/> <br/>";
		echo "<strong>Modelo do Carro:</strong>" .@$modelocarro;
		echo "<br/> <br/>";
		echo "<strong>Status:</strong>" .@$status;
		echo "<br/> <br/>";
		echo "<strong>Sexo:</strong>" .@$sexo;
         */
		}
} else{
echo "Desculpe nenhum registro foi encontrado!!!";
}
?>
</body>
</html>