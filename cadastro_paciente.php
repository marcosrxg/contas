<!doctype html>
<html lang = "pt-br">
<head>
<meta charset = "UTF-8">
<title> Cadastro do Paciente </title>
</head>
<body>
<h1>Cadastro do Paciente</h1>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$pdo = new PDO('mysql:host=localhost;dbname=contas','root','');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $pdo->prepare('INSERT INTO paciente (dsPessoaFisica, cdSexo, dtNascimento, nrCpf) VALUES(:nome, :sexo, :datenc, :cpf)'); 
	$stmt->execute(array( ':nome' => $_POST['nome'], ':sexo' => $_POST['sexo'], ':datenc' => $_POST['datenc'], ':cpf' => $_POST['cpf']));
}
?>

<form method="POST" action="" name = "tipo_atend">
<label>Nome:</label><input type="text" name="nome" id="nome" required="required">
<br>
<br>
<label>Sexo:</label>
<select name="sexo">
	<option value="Masculino">Masculino</option>
	<option value="Feminino">Feminino</option>
</select>
<br>
<br>
<label>Data de Nascimento:</label><input type="date" name="datenc" id="datanc" required="required">
<br>
<br>
<label>CPF: </label><input type="text" name="cpf" \ pattern="\d{3}\.\d{3}\.\d{3}.\d{2}" \ title="Digite um CPF no formato: xxx.xxx.xxx-xx">
<br>
<br>
<input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
<br>
<br>
<a href="index.html" title="Pagina Inicial" >Voltar</a>
</form>
</body>
</html>