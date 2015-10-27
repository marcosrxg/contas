<?
$pdo = new PDO('mysql:host=localhost;dbname=u629263801_conta','u629263801_root','contas');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->prepare('SELECT 	 a.nrAtendimento, 
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
$dados = $stmt->fetchAll();

if(count($dados)> 0) {
	$arquivo = "contas.xml";
	$ponteiro = fopen($arquivo, "w");
	fwrite($ponteiro, "<?xml version='1.0' encoding='UTF-8'?>\n");
	fwrite($ponteiro, "<?xml-stylesheet type='text/xsl' href='conta.xsl'?>\n");
	fwrite($ponteiro, "<guia>\n");

foreach($dados as $dado){

	$conteudo .= "  <contas>\n";
	$conteudo .= "    <atendimento>".$dado['nrAtendimento']."</atendimento> \n";
	$conteudo .= "    <nome>".$dado['dsPessoaFisica']."</nome>  \n";
	$conteudo .= "    <tipo-atendimento>".$dado['dsTipoAtendimento']."</tipo-atendimento>  \n";
	$conteudo .= "    <convenio>".$dado['dsConvenio']."</convenio>  \n";
	$conteudo .= "    <dtEntrada>".$dado['dtEntrada']."</dtEntrada>  \n";
	$conteudo .= "    <dtAlta>".$dado['dtAlta']."</dtAlta>  \n";
	$conteudo .= "    <vrTotal>".$dado['vlTotalConta']."</vrTotal>  \n";
	$conteudo .= "  </contas>  \n";
	fwrite($ponteiro, $conteudo);
} 
	fwrite($ponteiro, "</guia>");
	fclose($ponteiro);
	echo "<h2>Contas</h2><br>";
	echo "O arquivo <b>".$arquivo."</b> foi gerado com SUCESSO !";
	echo "<br><br><a href='contas.xml'>$arquivo</a>";
}
?>
