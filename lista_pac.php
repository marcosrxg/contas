<!doctype html>
<html lang = "pt-br">
<head>
<meta charset = "UTF-8">
<title> Lista Paciente</title>
</head>
<body>
<h1>Lista Paciente</h1>

<?php
	$pdo = new PDO('mysql:host=localhost;dbname=u629263801_conta','u629263801_root','contas');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $pdo->prepare('SELECT * FROM paciente'); 
	$stmt->execute();
?>
<?php
echo '<table border = 1> 
<tr> 
<td>Código</td>
<td>Paciente</td> 
<td>Sexo</td>
<td>Data de Nascimento</td> 
<td>CPF</td> 
</tr>';
while ($pdo = $stmt->fetch()){
	echo "<tr>\n";
	echo "<td>".$pdo['cdPessoaFisica']."</td>\n";
	echo "<td>".$pdo['dsPessoaFisica']."</td>\n";
	echo "<td>".$pdo['cdSexo']."</td>\n";
	echo "<td>".$pdo['dtNascimento']."</td>\n";
	echo "<td>".$pdo['nrCpf']."</td>\n";
	echo "</tr>\n";
}
echo "</table>\n"; 
?>
<br>
<br>
<a href="index.html" title="Pagina Inicial" >Voltar</a>
</form>
</body>
</html>
