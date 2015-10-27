<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
<xsl:template match="/">
<html>
<body>
<h2>Contas</h2>
<table border="1">
<tr bgcolor="#00FFFF">
<th>Atendimento</th>
<th>Paciente</th>
<th>Tipo Atendimento</th>
<th>Convênio</th>
<th>Data Entrada</th>
<th>Data Alta</th>
<th>Valor Total</th>
</tr>
<xsl:for-each select="guia/contas">
<tr>
<td><xsl:value-of select="atendimento"/></td>
<td><xsl:value-of select="nome"/></td>
<td><xsl:value-of select="tipo-atendimento"/></td>
<td><xsl:value-of select="convenio"/></td>
<td><xsl:value-of select="dtEntrada"/></td>
<td><xsl:value-of select="dtAlta"/></td>
<td><xsl:value-of select="vrTotal"/></td>
</tr>
</xsl:for-each>
</table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
