<?php
if (!isset($_GET['buscar_acesso'])) {
	header("Location: docs.php");
	exit;
}

$nomeA = "%".trim($_GET['buscar_acesso'])."%";

$dbh = new PDO('mysql:host=localhost;dbname=candieiros_login', 'root', '');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sth = $dbh->prepare('SELECT * FROM `acessos` WHERE `nomeA` LIKE :nomeA');
$sth->bindParam(':nomeA', $nomeA, PDO::PARAM_STR);
$sth->execute();

$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Resultado da busca</title>
</head>
<body>
<h2>Resultado da busca</h2>
<?php
if (count($resultados)) {
	foreach($resultados as $Resultado) {
?>
<label><?php echo $Resultado['id_acesso']; ?> - <?php echo $Resultado['nomeA']; ?></label>
<label>Email: <?php echo $Resultado['email']; ?> Senha: <?php echo $Resultado['senha']; ?></label>
<br>
<?php
	}
} else {
?>
<label>Não foram encontrados resultados pelo termo buscado.</label>
<?php
}
?>
</body>
</html>