<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns="http://www.w3.org/1999/xhtml"
                version="1.0">
<xsl:output indent="yes"/> 

<xsl:template match="receptlista">
	<html>
     <head>
	 <link rel="stylesheet" type="text/css" href="index.css"/>
	 <title><xsl:value-of select="recept/@receptnamn"/></title>
	 <meta charset="UTF-8"/>
	 </head>
	 <body>
	 
		 <table><tr>
		 <td><form><input type="button" value="Tillbaka till startsidan" onClick="window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/index.php'"/></form></td>
		 <td><form><input type="button" value="Redigera" onClick="window.location.href='logga_in_red.php?recid={recept/@receptid}'"/></form></td>
		 </tr>
		 <tr><td><form><input type="button" value="Tillbaka till receptlistan" onClick="window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/receptlista.php'"/></form></td>
		 </tr>
		 </table>
	
	 <h2><xsl:value-of select="recept/@receptnamn"/></h2>
	 <xsl:apply-templates select="recept"/>	
	 </body>
	</html>
</xsl:template>

<xsl:template match="recept">
	<p id="kategori"><xsl:value-of select="@kategori"/></p>
	<xsl:if test="@specialkost!='Ingen'">
	<p id="specialkost"><xsl:value-of select="@specialkost"/></p>
	</xsl:if>
	<p id="beskrivning"><xsl:value-of select="beskrivning"/></p>

	Tidsåtgång: <p id="tidsatgang"><xsl:value-of select="@tidsatgang"/></p> minuter.

	<h3>Ingredienser</h3>
	<xsl:apply-templates select="ingrediens"/>
	<br/>
	<h3>Gör så här:</h3>
	<pre><xsl:value-of select="instruktion"/></pre>
</xsl:template>


<xsl:template match="ingrediens">
	<li>
	<xsl:value-of select="@ingrediensnamn"/><xsl:text> </xsl:text>
	<xsl:value-of select="@mangd"/><xsl:text> </xsl:text>
	<xsl:value-of select="@mattenhet"/>
	</li>
</xsl:template>

</xsl:stylesheet>