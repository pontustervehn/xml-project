<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns="http://www.w3.org/1999/xhtml"
                version="1.0">
<xsl:output indent="yes"/> 
	
<!--><xsl:output method="html"/>-->

<xsl:template match="receptlista">
	<html>
     <head>
	 <link rel="stylesheet" type="text/css" href="index.css"/>
	 <title><xsl:value-of select="titel"/></title>
	<meta charset="UTF-8"/>
	 </head>
	 <body>
	 <form><input type="button" value="Tillbaka till startsidan" onClick="window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/index.php'"/></form> 
	<h2 id="receptlista_titel"><xsl:value-of select="titel"/></h2>
	<br/>
	<xsl:apply-templates select="recept"/>	
	</body>
	</html>
</xsl:template>

<xsl:template match="recept">
	<a href="{@lank}"><xsl:value-of select="@namn"/></a>
	<br/>
</xsl:template>

</xsl:stylesheet>