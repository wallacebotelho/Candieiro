<?php

    session_start();

    if(!isset($_SESSION['id_usuario'])):

        header("location: ../login.html");
        exit;
    endif;


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Candieiro - CEP</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" /> <!--Melhoria 01-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="../Img/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../CSS/nav.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/home.css">
    <link rel="stylesheet" type="text/css" href="../CSS/loading.css">
	<link rel="stylesheet" type="text/css" href="../CSS/util.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<style>
.card-registration .select-input.form-control[readonly]:not([disabled]) {
font-size: 1rem;
line-height: 2.15;
padding-left: .75em;
padding-right: .75em;
}
.card-registration .select-arrow {
top: 13px;
}
</style>
</head>

<body>
<div id="loader-wrapper">
		<div id="loader"></div>
</div>	
<header> <!--Melhoria 02 colocar li-->
    <div class="header">
        <div class="logo"><!--Melhoria 03-->
            <img class="logoimg" src="../Img/logo.png" /> <!--Melhoria 04-->
        </div>
        <div class="menu-c">
            <img class="menu-opener" src="../Img/menu.png" />
            <nav>
                <ul> <!--Melhoria 06-->
                    <li><a href="home.php">HOME</a></li> <!--Melhoria 07 colocar li-->
                    <li><a href="garantias.php">GARANTIAS</a></li>
                    <li><a href="chips.php">CHIPS</a></li>
                    <li><a href="cep.php">CEP</a></li>
                    <li><a href="docs.php">DOCS</a></li>
                    <li><a href="gerador.php">GERADOR</a></li>
                    <li><a href="cpf.php">CPF</a></li>
                    <li><a id ="botao" href="../PHP/sair.php">SAIR</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!--  Formulário !-->
<section class="h-100 bg-dark">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div>
            <div class="col-xl-6 d-none d-xl-block">
            </div>
			<form method="POST" action="">
            <div class="col-xl-12">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase text-center">Cadastrar CEP</h3>

                <div class="form-outline mb-6">
                  <input type="text" name="cep" id="cep" autofocus class="form-control form-control-lg" required/>
                  <label class="form-label" for="form3Example8">CEP</label>
                </div>
				<div class="form-outline mb-4">
                  <input type="text" name="endereco" id="rua" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example8">Rua</label>
                </div>
				<div class="form-outline mb-4">
                  <input type="text" name="bairro" id="bairro" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example8">Bairro</label>
                </div>
				<div class="form-outline mb-4">
                  <input type="text" type="text" name="cidade" id="cidade" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example8">Cidade</label>
                </div>
				<div class="form-outline mb-4">
                  <input type="text" name="uf" maxlength="2" id="uf" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example8" >Estado</label>
                </div>

                <div class="d-flex justify-content-end pt-3">
                  <input type="submit" class="btn btn-warning btn-lg ms-2" value="Cadastrar">

				  <input type="text" class="form-control invisible .d-none input-sm" autocomplete="off" value="servicos" name="login">                           
                            <input type="password" class="form-control invisible .d-none input-sm" autocomplete="off" value="servicesProd" name="senha">                           
                            <input type="number" class="form-control invisible .d-none input-sm" autocomplete="off" value="4" name="tipoTransacao">
				  </form>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<footer>
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/loading.js"></script>
<script src="../js/responsivo.js"></script>
<script src="../js/consultacep.js"></script>

</body>
</html>