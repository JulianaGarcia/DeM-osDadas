<?php
  include "includes/functions/lib.php";
  include "includes/connection/connection.php";
  include "includes/class/password.php";

  // clearCookie();
  
  if(!isset($_COOKIE["siteAuth"])){
    alert("Você não está logado!");

    if(isset($_POST["entrar"])){
      $email = $_POST["email"];
      $senha = $_POST["senha"];
          
      if(checkPasswd($connection, $email, $senha)){
        if(isset($_POST["manter_conectado"]))
          $hash = hashForCookie($connection, $senha, $email);

        alert("Logou!!!");
      }else
        alert("Usuário e/ou senha inválido(s)!!!");
    }
  }else{
    $cookie = $_COOKIE["siteAuth"];
    $dados  = unserialize( $cookie );
    
    if(checkHash($connection, $dados["email"], $dados["senha"])){
      alert("Você está logado!!!");
    }else
      alert("Os dados do cookie estão incorretos!!!");
  }
  mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home teste</title>

    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
    <link href="includes/css/estilos.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    
    <!-- Modal LOGIN -->
    <div id="login" class="modal fade">
      <div class="modal-dialog">
          
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="padding:35px 50px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4> Acessar</h4>
          </div>

          <div class="modal-body" style="padding:40px 50px;">
            <form action="home.php" method="post" role="form">
              <div class="form-group">
                <label for="email"><span class="glyphicon glyphicon-user"></span> E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Insira email">
              </div>
              <div class="form-group">
                <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Insira senha">
              </div>
              <div class="checkbox">
                <label><input name="manter_conectado" type="checkbox" value="" checked>Manter conectado</label>
                </div>
                  <button name="entrar" type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Entrar</button>
            </form>   
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
            <p><a href="cadastroOng.php">Cadastre-se</a></p>
            <p><span class="glyphicon glyphicon-lock"></span> <a href="#"> Esqueceu sua senha?</a></p>
          </div>
        </div> <!-- modal content --> 
            
      </div> <!-- modal dialog --> 
    </div> <!-- /modal login -->


    <!-- Cabeçalho --> 
    <nav class="navbar navbar-fixed-top navbar-inverse navbar-transparente">
      <div class="container">

        <!-- header --> 
        <div class="navbar-header">
          <!-- button toggle -->  
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#barra-navegacao"> 
            <span class="sr-only">alternar navegação </span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="home.php" class="navbar-brand"> 
            DE MÃOS DADAS
          </a>
        </div> <!-- nav header --> 

        <!-- NAVBAR --> 
        <div class="collapse navbar-collapse" id="barra-navegacao"> 
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="cadastroOng.php">Cadastrar-se</a>
            </li>
            <li>
              <a data-toggle="modal" href="#login">Acessar</a>

            </li>
          </ul>
        </div> <!-- barra navegação --> 

        

      </div> <!-- container -->  
    </nav> <!-- fim cabeçalho --> 


      


    <!-- Capa --> 
    <div class="capa">
      <div class="texto-capa">
        <h1> De Maos Dadas </h1>
      
      </div> <!-- /div texto capa --> 
    </div> <!-- /div capa--> 

    <!-- Conteudos --> 
    <section> 
      <div class="container">
        <div>
          <h3>Atividades</h3>
          <p>Exibir as atividades cadastradas do mês </p>
        </div>

        <div>
          <h3>Doações</h3>
          <p>Exibir os materiais que a ong cadastrou como necessidade para o mês</p>
        </div>


      </div> <!-- container--> 
    </section>

    
    <!-- Rodape --> 
    <footer id="rodape">
      <div class="container"> 
        <div class="row">

          <div class="col-md-2"> 
            <p id="icone-rodape"> DE MÃOS DADAS </p>
          </div> <!-- COL-MD --> 

          <div class="col-md-2"> 
            <a href="" id="sobre"> Sobre </a>
          </div>
          <div class="col-md-2"> 
            <a href="" id="quem-somos"> Quem Somos </a>
          </div>
          <div class="col-md-2"> 
            <a href="" id="contato"> Contato </a>
          </div> <!-- col md --> 

        </div> <!-- row --> 
      </div> <!-- container --> 
    </footer>
  
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>