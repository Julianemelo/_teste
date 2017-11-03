<html>
<head>
<title>Login</title>
    <link rel="stylesheet" href="teste3.css">
</head>

<body>
<div class="container">
    <img src="mot.png">
    <form name="loginform" method="post" action="userauthentication.php">

        <div class="form-input">
            <input type="text" name="cpf" placeholder="CPF"/> <br/> <br/>
        </div>
              <div class="form-input">
            <input type="password" name="senha" placeholder="Entre com sua senha"/> <br/> <br/>
        </div>

        <input type="submit" value="Entrar" class="btn-login"/>
    </form>
</div>

</body>
</html>