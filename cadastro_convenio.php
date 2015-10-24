<!doctype html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title> Cadastro de Convênio </title>
</head>
<body>
<h1> Cadastro de Convênio</h1>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$pdo = new PDO('mysql:host=localhost;dbname=u629263801_conta','u629263801_root','contas');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $pdo->prepare('INSERT INTO convenio (dsConvenio) VALUES(:convenio)'); 
	$stmt->execute(array( ':convenio' => $_POST['convenio'] ));
}
?>

<form method="POST" action="" name="convenio">
<label>Convênio:</label><input type="text" name="convenio" id="convenio">
<br>
<br>
<input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
<br>
<br>
<a href="index.html" title="Pagina Inicial" >Voltar</a>
</form>
</body>
</html>
