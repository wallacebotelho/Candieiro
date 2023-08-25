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
    <title>Candieiro - Consulta</title>
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
                    <li><a href="cpf.php">CONSULTA</a></li>
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
			<form method="POST" action="cpf.php">
            <div class="col-xl-12">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase text-center">Consulta na Receita</h3>

                <div class="form-outline mb-6">
                  <input type="number" name="cpf_cnpj" id="cpf_cnpj" autofocus class="form-control form-control-lg" required/>
                  <label class="form-label" for="form3Example8">CNPJ</label>
                </div>

				<button
            type="submit"
            class="transition-colors h-full px-2 text-xl rounded-r bg-indigo-500 text-white hover:bg-indigo-500/80"
          >
            <div
              id="carregando"
              style="display: none"
              class="h-6 w-6 border-t-2 border-white rounded-full animate-spin"
            ></div>

            <div id="icon">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                />
              </svg>
            </div>

				  </form>
                  <section>
               
                  </section>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="result" class="flex flex-col gap-2"></div>
      </div>
</section>


<footer>
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/loading.js"></script>
<script src="../js/responsivo.js"></script>
<script src="../js/cnpj.js"></script>


</body>
</html>