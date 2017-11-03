<!DOCTYPE html>
<html lang="pt-br">
<head>


    <meta charset="UTF-8"/>
    <title> Easy Mobility </title>
</head>
<body>
<nav class="links">
    <label for="rd_home">HOME</label>
    <label for="rd_passageiro">PASSAGEIRO</label>
    <label for="rd_motorista">MOTORISTA</label>

</nav>
<div class="scroll">
    <input type="radio" name="grupo" id="rd_home" checked="true" id="h1">
    <input type="radio" name="grupo" id="rd_passageiro">
    <input type="radio" name="grupo" id="rd_motorista">

    <div class="sections">

        <div class="bloco" id="HOME">
            <div class="container1">
                <img src="img/mot.png">
                <form name="loginform" method="post" action=" ">
                    MOTORISTA
                    <div class="form-input">
                        <input type="text" name="cpf"  placeholder="CPF"/> <br/> <br/>
                    </div>
                    <div class="form-input">
                        <input type="password" name="senha" placeholder="Entre com sua senha"/> <br/> <br/>
                    </div>

                    <input type="submit" value="Entrar" class="btn-login"/>
                </form>
                <a href="#MOTORISTA"> Não tem cadastro?</a>
            </div>
            <div class="container2" id="bloco1">
                <img src="img/pas.png">
                <form name="loginform" method="post" action="userauthentication1">
                    PASSAGEIRO
                    <div class="form-input">
                        <input type="text" name="cpf"  placeholder="CPF"/> <br/> <br/>
                    </div>
                    <div class="form-input">
                        <input type="password" name="senha" placeholder="Entre com sua senha"/> <br/> <br/>
                    </div>

                    <input type="submit" value="Entrar" class="btn-login"/>
                </form>
                <a href="#PASSAGEIRO"> Não tem cadastro?</a>
            </div>
        </div>


        <div class="bloco" id="PASSAGEIRO">
            <div class="container3">  <img src="img/passageiro.jpg"></div>
            <div class="container">
                <img src="img/pas.png">
                <form name="signup" method="post" action="passageiro">
                    <div class="form-input">
                        <input type="text" name="nome" required="required" placeholder="Nome"/> <br/> <br/>
                    </div>
                    <div class="form-input">
                        <input type="text" name="datanasc" required="required" placeholder="Data de Nascimento"/> <br/> <br/>
                    </div>
                    <div class="form-input">
                        <input type="text" name="cpf" required="required" placeholder="CPF"/> <br/> <br/>
                    </div>
                    <div class="form-input">
                        <input type="text" name="sexo" required="required" placeholder="Sexo"/> <br/> <br/>
                    </div>
                    <div class="form-input">
                        <input type="password" name="senha" required="required" placeholder="Cadastre uma senha"/> <br/> <br/>
                    </div>

                    <input type="submit" name="submit" value="Cadastrar" class="btn-login"/>
                </form>
                <h3> Todos os campos são obrigatorios </h3>
            </div>


        </div>

        <div class="bloco" id="MOTORISTA">
            <div class="container3">  <img src="img/motorista.jpg"></div>
            <div class="container">
                <img src="img/mot.png">
                <form name="signup" method="post" action="motorista">
                    <div class="form-input">
                        <input type="text" name="nome" required="required" placeholder="Nome"/> <br/> <br/>
                    </div>
                    <div class="form-input">
                        <input type="text" name="datanasc" required="required" placeholder="Data de Nascimento"/> <br/> <br/>
                    </div>
                    <div class="form-input">
                        <input type="text" name="cpf" required="required" placeholder="CPF"/> <br/> <br/>
                    </div>
                    <div class="form-input">
                        <input type="text" name="modelocarro" required="required" placeholder="Modelo do Carro"/> <br/> <br/>
                    </div>
                    <div class="form-input">
                        <input type="hidden" name="status" required="required" value="1"/>
                    </div>
                    <div class="form-input">
                        <input type="text" name="sexo" required="required" placeholder="Sexo"/> <br/> <br/>
                    </div>
                    <div class="form-input">
                        <input type="password" name="senha" required="required" title="Está senha será utilizada para login" placeholder="Cadastre uma senha"/> <br/> <br/>
                    </div>

                    <input type="submit" name="submit" value="Cadastrar" class="btn-login"/>
                </form>
                <h3> Todos os campos são obrigatorios </h3>
            </div>

        </div>
    </div>
</div>
</body>
</html>