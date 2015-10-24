<!doctype html>
<html lang = "pt-br">
<head>
<meta charset = "UTF-8">
<title> Lista Atendimento</title>
</head>
<body>
<h1>Lista Atendimento</h1>

<?php
	$pdo = new PDO('mysql:host=localhost;dbname=u629263801_conta','u629263801_root','contas');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $pdo->prepare('SELECT a.nrAtendimento, 
								  p.dsPessoaFisica, 
                                  tp.dsTipoAtendimento, 
                                  c.dsConvenio, 
                                  a.dtEntrada, 
                                  a.dtAlta, 
                                  a.vlTotalConta
                            FROM atendimento a, 
                                 paciente p, 
                                 tipoatendimento tp, 
                                 convenio c
                            WHERE a.cdPaciente = cdPessoaFisica
                            AND a.cdTipoAtendimento = tp.cdTipoAtendimento
                            AND a.cdConvenio = c.cdConvenio'); 
	$stmt->execute();
?>
<?php
echo '<table border = 1> 
<tr> 
<td>Atendimento</td>
<td>Paciente</td> 
<td>Tipo de Atendimento</td>
<td>Convênio</td> 
<td>Data de Entrada</td> 
<td>Data de Alta</td>
<td>Valor da Conta</td> 
</tr>';
while ($pdo = $stmt->fetch()){
	echo "<tr>\n";
	echo "<td>".$pdo['nrAtendimento']."</td>\n";
	echo "<td>".$pdo['dsPessoaFisica']."</td>\n";
	echo "<td>".$pdo['dsTipoAtendimento']."</td>\n";
	echo "<td>".$pdo['dsConvenio']."</td>\n";
	echo "<td>".$pdo['dtEntrada']."</td>\n";
	echo "<td>".$pdo['dtAlta']."</td>\n";
	echo "<td>".$pdo['vlTotalConta']."</td>\n";
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
