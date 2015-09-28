<?php $PDO = new PDO('mysql:host=localhost;dbname=contas','bcont','contas'); ?>
<?php $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); ?>
<!doctype html>
<html lang = "pt-br">
<head>
<meta charset = "UTF-8">
<title> Cadastro de Atendimento </title>
</head>
<body>
<h1>Cadastro de Atendimento</h1>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
	if($_POST['nome'] == 0){
		$lsErro = "Selecione o paciente.";
	} else if($_POST['tipoatend'] == 0){
		$lsErro = "Selecione o tipo de atendimento.";
	} else if($_POST['convenio'] == 0){
		$lsErro = "Selecione o convênio.";
	} else {
		$stmt = $PDO->prepare('INSERT INTO atendimento (nrAtendimento, cdPaciente , cdTipoAtendimento, cdConvenio, dtEntrada, dtAlta, vlTotalConta) VALUES(:atend, :nome, :tipoatend, :convenio, :dtEntrada, :dtAlta, :valor)'); 
		$stmt->execute(array( ':atend' => $_POST['atend'],':nome' => $_POST['nome'], ':tipoatend' => $_POST['tipoatend'], ':convenio' => $_POST['convenio'], ':dtEntrada' => $_POST['dataentrada'],':dtAlta' => $_POST['dataalta'], ':valor' => $_POST['valor'] ));
	}
}
?>

<form method = "POST" action = "" name = "cadastro_atend">
<label>Atendimento: </label><input type="text" name="atend" id="atend" required="required">
<br>
<br>
<label>Nome: </label>
<select name="nome">
<?php
	$sql1 = $PDO->prepare('SELECT * FROM paciente');
	$sql1->execute();
?>
	<option value="0">Selecione um paciente...</option>
<?php while($laPaciente = $sql1->fetch()): ?>
  <option value="<?php echo $laPaciente['cdPessoaFisica']?>"><?php echo $laPaciente['dsPessoaFisica']?></option> 
<?php endwhile; ?>
</select> 
<br>
<br>
<label>Tipo de Atendiemnto: </label>
<select name="tipoatend">

<?php
	$sql2 = $PDO->prepare('SELECT * FROM tipoatendimento');
	$sql2->execute();
?>
	<option value="0">Selecione um tipo de atendimento...</option>
<?php while($laTipoAtendimento = $sql2->fetch()): ?>
		<option value="<?php $laTipoAtendimento['cdTipoAtendimento']?>"><?php $laTipoAtendimento['dsTipoAtendimento']?></option>';    
<?php endwhile; ?>		
</select> 
<br>
<br>
<label>Convênio: </label>
<select name="convenio">
<option value="0">Selecione um convênio...</option>
<?php
	$sql3 = $PDO->prepare('SELECT * FROM convenio');
	$sql3->execute();
?>
<?php while($laConveio = $sql3->fetch()): ?>
		<option value="<?php $laConveio['cdConvenio']?>"><?php $laConveio['dsConvenio']?></option>';    
<?php endwhile; ?> 
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

<style>
.error-msg{
	padding: 12px;
    background-color: #F30707;
    color: #FFF;
    font-size: 18px;
    border-radius: 9px;
}
</style>


<?php if(!empty($lsErro)): ?>
	<p class="error-msg"><?php echo $lsErro?></p>
<?php endif; ?>
</form>
</body>
</html>