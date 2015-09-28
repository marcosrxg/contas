<!doctype html>
<html lang = "pt-br">
<head>
<meta charset = "UTF-8">
<title> Lista Tipo de Atendimento </title>
</head>
<body>
<h1>Lista Tipo de Atendimento</h1>

<?php
	$pdo = new PDO('mysql:host=localhost;dbname=contas','bcont','contas');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $pdo->prepare('SELECT * FROM tipoatendimento'); 
	$stmt->execute();
?>
<?php
echo '<table border = 1> 
<tr> 
<td>Código</td>
<td>Tipo Atendimento</td> 
</tr>';
while ($pdo = $stmt->fetch()){
	echo "<tr>\n";
	echo "<td>".$pdo['cdTipoAtendimento']."</td>\n";
	echo "<td>".$pdo['dsTipoAtendimento']."</td>\n";
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