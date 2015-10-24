<!doctype html>
<html lang = "pt-br">
<head>
<meta charset = "UTF-8">
<title> Cadastro Tipo de Atendimento </title>
</head>
<body>
<h1>Cadastro Tipo de Atendimento</h1>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$pdo = new PDO('mysql:host=localhost;dbname=u629263801_conta','u629263801_root','contas');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $pdo->prepare('INSERT INTO tipoatendimento (dsTipoAtendimento) VALUES(:tp_atend)'); 
	$stmt->execute(array( ':tp_atend' => $_POST['tp_atend'] ));
}
?>

<form method="POST" action="" name = "tipo_atend">
<label>Tipo Atendimento:</label><input type="text" name="tp_atend" id="tp_atend">
<br>
<br>
<input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
<br>
<br>
<a href="index.html" title="Pagina Inicial" >Voltar</a>
</form>
</body>
</html>
