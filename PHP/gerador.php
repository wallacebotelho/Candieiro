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
    <title>Candieiro - GERADOR</title>
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
			<form method="POST" action=http://gtester.redepos.com.br/redepos/clientevip-cliente/imagem-certificado-unico?id_cliente=&data_sorteio=&sequencial=&print=1">
            <div class="col-xl-12">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase text-center">Gerador de Título</h3>

                <div class="form-outline mb-6">
                  <input type="text" name="id_cliente" autofocus class="form-control form-control-lg" required/>
                  <label class="form-label" for="form3Example8">Id Cliente</label>
                </div>
				<div class="form-outline mb-4">
                  <input type="text" name="data_sorteio" class="form-control form-control-lg" required />
                  <label class="form-label" for="form3Example8">Data Sorteio</label>
                </div>
				<div class="form-outline mb-4">
                  <input type="text" name="sequencial" class="form-control form-control-lg" required />
                  <label class="form-label" for="form3Example8">Sequencial</label>
                </div>

                <div class="d-flex justify-content-end pt-3">
                  <input type="submit" class="btn btn-warning btn-lg ms-2" value="Gerar">

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


</body>
</html>