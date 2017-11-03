<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Easy Mobility </title>
    <link rel="shortcut icon" href="icon.ico" >
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/3.3/assets/css/ie10-viewport-bug-workaround.css">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/3.3/examples/carousel/carousel.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie-emulation-modes-warning.js"></script>

</head>
<!-- NAVBAR
================================================== -->
<body>
<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-inverse  navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Alternar Navegação</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="home" class="navbar-brand"> <span  class="glyphicon glyphicon-map-marker"></span> Easy Mobility</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse" >
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#about">Sobre Nós</a></li>
                        <li><a href="#login">Entrar</a></li>
                        <li><a href="#create">Criar Conta</a></li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</div>


<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="img/slide/01.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Dirija quando quiser</h1>
                    <p>Ganhe o dinheiro que você precisa</p>
                    <h3>Dirigir com a Easy Mobility é uma oportunidade flexível que ajuda os motoristas parceiros a alcançarem seus objetivos pessoais.</h3>
                    <p><a class="btn btn-lg btn-primary" href="#create" role="button">Cadastre-se</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide" src="img/slide/02.jpg" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Alcance seus objetivos</h1>
                    <p> Aproveite melhor o seu tempo</p>

                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="img/slide/03.jpg" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Nossa Comunidade</h1>
                    <p>Nossa comunidade de motoristas parceiros é feita de pessoas de diferentes origens, experiências e interesses.</p>

                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->
<div class="container marketing">

<div id="about" class="row">
    <div class="col-lg-12">
        <h2 class="text-center">Sobre Nós</h2>
        <p style="font-size:15px;">
            A <b>Easy mobily</b> é a maior aplicação web brasileira de mobilidade e está presente nos grandes centros urbanos São Paulo, Rio de Janeiro, Curitiba, Salvador e Belo Horizonte.
        </p>
        <p>
            Além de trabalhar para atender da melhor maneira seus parceiros motoristas e os passageiros, temos como missão causar mudanças que impactem positivamente a população: tornar o transporte mais barato, mais rápido e mais seguro usando a tecnologia.
        </p>
        <p>
            Fundada em 2017, a <b>Easy mobily</b> é uma das maiores startups da <i>América Latina</i>, a maior empresa de mobilidade urbana do mundo.
            Se você se identifica com nossa cultura e valores, venha ser um de nós!
        </p>
    </div>
</div>

    <div id="login" class="row">
        <div class="col-lg-12 text-center">
                <h2>Já tem Conta?</h2>
                 <hr>
        </div>
    </div>
    <div class="row">
        <div id="motor" class="col-lg-6">
            <form action="userauthentication" method="post">
                <div class="form-group text-center">
                    <img style="width:100px;" src="img/mot.png">
                    <h4>Sou Motorista</h4>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">CPF</label>
                    <input name="cpf" type="text" class="form-control"  placeholder="Infome seu CPF">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Senha</label>
                    <input name="senha" type="password" class="form-control"  placeholder="Informe Sua Senha">
                </div>
                <small id="emailHelp" class="form-text text-muted text-danger">Todos os  Campos são obrigatórios</small><br />

                <button type="submit" class="btn btn-success">Entrar</button>
            </form>
            <br/>
            <?php
            if(isset($_SESSION['erro'])) {
                echo "<div id='erro' class='alert alert-danger'>" . $_SESSION['erro'] . "</div>";
                unset($_SESSION['erro']);
            }
                if(isset($_SESSION['okm'])){
                    echo "<div id='okm' class='alert alert-success'>".$_SESSION['okm']."</div>";
                    unset($_SESSION['okm']);
                ?>
                <script> setTimeout(function() { $('#okm').fadeOut('fast');}, 2000);</script>
            <?php  }
              if(isset($_SESSION['edit'])){
                  echo "<div id='alteracao' class='alert alert-info'>Algumas Alterações Foram feita em sua conta, faça login novamente.</div>";
                  echo "<script> setTimeout(function() { $('#alteracao').fadeOut('fast');}, 8000);</script>";
                  unset($_SESSION['edit']);
              }

            ?>
        </div><!-- /.col-lg-6 -->
        <div id="passg" class="col-lg-6">
            <form action="userauthentication1" method="post">
                <div class="form-group text-center">
                    <img style="width:100px;" src="img/pas.png">
                    <h4>Sou Passageiro</h4>
                </div>
                <div class="form-group">
                    <label for="">CPF</label>
                    <input name="cpf" type="text" class="form-control"  placeholder="Infome seu CPF">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Senha</label>
                    <input name="senha" type="password" class="form-control"  placeholder="Informe Sua Senha">
                </div>
                <small id="emailHelp" class="form-text text-muted text-danger">Todos os  Campos são obrigatórios</small><br />

                <button type="submit" class="btn btn-success">Entrar</button>
            </form>
            <br/>
            <?php
            if(isset($_SESSION['erroPassageiro'])){
                echo "<div id='erroPassageiro' class='alert alert-danger'>".$_SESSION['erroPassageiro']."</div>";
                unset($_SESSION['erroPassageiro']);
                 ?>
                <script> setTimeout(function() { $('#erroPassageiro').fadeOut('fast');}, 2000);</script>
                 <?php  } ?>
            <?php
            if(isset($_SESSION['okp'])){
                echo "<div id='okp' class='alert alert-success'>".$_SESSION['okp']."</div>";
                unset($_SESSION['okp']);
                ?>
                <script> setTimeout(function() { $('#okp').fadeOut('fast');}, 2000);</script>
            <?php  } ?>
            <hr>

        </div><!-- /.col-lg-6 -->
        <div class="row">
            <div class="form-group text-center">
                <h2>O que dizem de nós</h2>
            </div>
            <div class="col-lg-4">
                <img class="img-circle" src="img/coment/01.jpg" alt="Generic placeholder image" width="140" height="140">
                <h2>André</h2>
                <p>"Comecei a fazer corridas compartilhadas, porque gostei da ideia de poder ganhar dinheiro com o meu próprio carro. Mas vi que isso era algo que eu queria fazer de forma permanente."</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="img-circle" src="img/coment/03.jpg" alt="Generic placeholder image" width="140" height="140">
                <h2>Teresa</h2>
                <p>"Eu queria algo que me fizesse sair de casa e conhecer novas pessoas. Além disso, estou conhecendo algumas partes da cidade que eu nunca tinha visto com um meio de transporte seguro e economonico!"</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="img-circle" src="img/coment/02.jpg" alt="Generic placeholder image" width="140" height="140">
                <h2>Juan</h2>
                <p>Fazer parte do time de uma empresa com proposta de corridas compartilhadas está me trazendo experiencias maravilhosas. Tenho a flexibilidade de trabalhar no meu horario e consigo mesmo assim ter uma renda, obrigado equipe Easy mobiblity! </p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->


    </div><!-- /.row -->
    <hr>
    <div id="create" class="row">
        <div class="col-lg-12 text-center">
            <h2>Criar uma Conta</h2>
            <hr>
        </div>
        <div id="motor" class="col-lg-6">
            <form name="signup" method="post" action="motorista">
                <div class="form-group text-center">
                    <img style="width:100px;" src="img/mot.png">
                    <h4>Criar conta de Motorista</h4>
                </div>
                <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="nome" required="required" placeholder="Nome"/>
                </div>
                <div class="form-group">
                    <label for="">Data de Nacimento</label>
                    <input type="text" class="form-control" name="datanasc" required="required" placeholder="Data de Nascimento"/>
                </div>
                <div class="form-group">
                    <label for="">CPF</label>
                    <input type="text" class="form-control" name="cpf" required="required" placeholder="CPF"/>
                </div>
                <div class="form-group">
                    <label for="">Modelo do Carro</label>
                    <input id="meioform" type="text" class="form-control" name="modelocarro" required="required" placeholder="Modelo do Carro"/>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="status" required="required" value="0"/>
                </div>
                <div class="form-group">
                    <label for="">Sexo</label>
                    <select class="form-control" name="sexo">
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino" >Feminino</option>
                        <option value="Indiferente">Indiferente</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Senha</label>
                    <input type="password" name="senha" class="form-control" required="required" title="Está senha será utilizada para login" placeholder="Cadastre uma senha"/>
                </div>
                <div class="form-group">
                    <label for="">Confirmar Senha</label>
                    <input type="password" name="senha1" class="form-control" required="required" title="Está senha será utilizada para login" placeholder="Cadastre uma senha"/>
                </div>

                <input type="submit" name="submit" value="Cadastrar" class="btn btn-info"/>
            </form>
            <br/>
            <?php
            if(isset($_SESSION['erro'])){
                echo "<div id='erro' class='alert alert-danger'>".$_SESSION['erro']."</div>";
                unset($_SESSION['erro']);
                echo "<script> setTimeout(function() { $('#erro').fadeOut('fast');}, 2000);</script>";
              }
            if(isset($_SESSION['passDiferente'])){
                echo "<div id='passDiferente' class='alert alert-danger'>".$_SESSION['passDiferente']."</div>";
                unset($_SESSION['passDiferente']);
                echo "<script> setTimeout(function() { $('#passDiferente').fadeOut('fast');}, 2000);</script>";
            }

              ?>
        </div><!-- /.col-lg-6 -->
        <div id="passg" class="col-lg-6">
            <form name="signup" method="post" action="passageiro">
                <div class="form-group text-center">
                    <img style="width:100px;" src="img/pas.png">
                    <h4>Criar conta de Passageiro</h4>
                </div>
                <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="nome" required="required" placeholder="Nome"/>
                </div>
                <div class="form-group">
                    <label for="">Data de Nacimento</label>
                    <input type="text" class="form-control" name="datanasc" required="required" placeholder="Data de Nascimento"/>
                </div>
                <div class="form-group">
                    <label for="">CPF</label>
                    <input type="text" class="form-control" name="cpf" required="required" placeholder="CPF"/>
                </div>
                <div class="form-group">
                    <label for="">Sexo</label>
                    <select class="form-control" name="sexo">
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino" >Feminino</option>
                        <option value="Indiferente">Indiferente</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Senha</label>
                    <input type="password" name="senha" class="form-control" required="required" title="Está senha será utilizada para login" placeholder="Cadastre uma senha"/>
                </div>
                <div class="form-group">
                    <label for="">Confirmar Senha</label>
                    <input type="password" name="senha1" class="form-control" required="required" title="Está senha será utilizada para login" placeholder="Cadastre uma senha"/>
                </div>

                <input type="submit" name="submit" value="Cadastrar" class="btn btn-info"/>
            </form>
            <br/>
            <?php
            if(isset($_SESSION['erroPassageiro'])){
                echo "<div id='erroPassageiro' class='alert alert-danger'>".$_SESSION['erroPassageiro']."</div>";
                unset($_SESSION['erroPassageiro']);
                ?>
                <script> setTimeout(function() { $('#erroPassageiro').fadeOut('fast');}, 2000);</script>
            <?php  } ?>

        </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->
   <hr>
    <!-- FOOTER -->
    <footer>
        <p class="pull-right"><a href="#">Voltar ao Topo</a></p>
        <p>&copy; <?php echo date('Y')?>  Easy Mobility. Todos os Direitos Reservados &middot; <a href="#">Privacidade</a> &middot; <a href="#">Termos</a></p>
    </footer>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../assets/js/vendor/holder.min.js"></script>
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
