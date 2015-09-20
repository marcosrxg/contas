<!doctype html>
<html lang = "pt-br">
<head>
<meta charset = "UTF-8">
<title> Cadastro de Atendimento </title>
</head>
<body>
<h1>Cadastro de Atendimento</h1>

<?php
	$pdo = new PDO('mysql:host=localhost;dbname=contas','root','');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$stmt = $pdo->prepare('INSERT INTO atendimento (nrAtendimento, cdPaciente , cdTipoAtendimento, cdConvenio, dtEntrada, dtAlta, vlTotalConta) VALUES(:atend, :nome, :tipoatend, :convenio, :dtEntrada, :dtAlta, :valor)'); 
	$stmt->execute(array( ':atend' => $_POST['atend'],':nome' => $_POST['nome'], ':tipoatend' => $_POST['tipoatend'], ':convenio' => $_POST['convenio'], ':dataentrada' => $_POST['dataentrada'],':dataalta' => $_POST['dataalta'], ':valor' => $_POST['valor'] ));
}
?>

<form method = "POST" action = "" name = "cadastro_atend">
<label>Atendimento: </label><input type="text" name="atend" id="atend" required="required">
<br>
<br>
<label>Nome: </label>
<select name="nome">
<?php
	$sql1 = $pdo->prepare('SELECT dsPessoaFisica FROM paciente');
	$sql1->execute();
      while($pdo = $sql1->fetch())
		{
          echo '<option value="'.$pdo['dsPessoaFisica'].'">'.$pdo['dsPessoaFisica'].'</option>';    
		}
?> 
</select> 
<br>
<br>
<label>Tipo de Atendiemnto: </label>
<select name="tipoatend">
<?php
	$pdo = new PDO('mysql:host=localhost;dbname=contas','root','');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql2 = $pdo->prepare('SELECT dsTipoAtendimento FROM tipo_atendimento');
	$sql2->execute();
      while($pdo = $sql2->fetch())
		{
          echo '<option value="'.$pdo['dsTipoAtedntimento'].'">'.$pdo['dsTipoAtendimento'].'</option>';    
		}
?> 
</select> 
<br>
<br>
<label>Convênio: </label>
<select name="convenio">
<?php
	$pdo = new PDO('mysql:host=localhost;dbname=contas','root','');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql3 = $pdo->prepare('SELECT dsConvenio FROM convenio');
	$sql3->execute();
      while($pdo = $sql3->fetch())
		{
          echo '<option value="'.$pdo['dsConvenio'].'">'.$pdo['dsConvenio'].'</option>';    
		}
?> 
</select> 
<br>
<br>
<label>Data de Entrada: <input type="datetime-local" name="dataentrada" required="required">
<br>
<br>
<label>Data de Alta: <input type="datetime-local" name="dataalta" required="required">
<br>
<br>
<label>Valor Total da conta: <input type="tel" required="required" maxlength="15" name="valor" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" />
<br>
<br>
<input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
<br>
<br>
<a href="index.html" title="Pagina Inicial" >Voltar</a>
</form>
</body>
</html>