<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns="http://www.w3.org/1999/xhtml"
                version="1.0">
<xsl:output indent="yes"/> 
	
<!--><xsl:output method="html"/>-->

<xsl:template match="receptlista">
	<html>
     <head>
	 	<title><xsl:value-of select="titel"/></title>
		<link rel="stylesheet" type="text/css" href="index.css"/>
		<meta charset="UTF-8"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, user-scalable=yes"/>
	 </head>
	 <body id="bodymobil">
	 <form><input type="button" value="Tillbaka till startsidan" onClick="window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/index.php'"/></form> 

	<h2 id="receptlista_titel_mobil"><xsl:value-of select="titel"/></h2>

	<xsl:apply-templates select="recept"/>

	</body>
	</html>
</xsl:template>

<xsl:template match="recept">
	<div class="rollovericons"><a id="listamobil" href="{@lank}"><xsl:value-of select="@namn"/></a></div>
	<br/>
</xsl:template>

</xsl:stylesheet>