<html>
<head>
<link rel="stylesheet" type="text/css" href="index.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, user-scalable=yes"/>
<title>Sök recept
</title>
</head>
<body>
<table><tr>
<td><form><input type="button" value="Tillbaka till startsidan" onClick="window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/index.php'"/></form></td>

</table>

<h2>Sök recept</h2>


<form name="input" action="soksvar.php" method="POST">	


<?php
$returnstring = '';

	$returnstring .= "Kategori<br>
<select name=\"kategori\">
<option value=\"ospecificerad\">Ospecificerad</option>
<option value=\"Kakor\">Kakor</option>
<option value=\"Bullar\">Bullar</option>
<option value=\"Tårtor\">Tårtor</option>
<option value=\"Bröd\">Bröd</option>
<option value=\"Knäck och Kola\">Knäck och kola</option>
<option value=\"Övrigt\">Övrigt</option>
</select><br><br>";
	

	$returnstring .= "Specialkost<br>
<select name=\"specialkost\">
<option value=\"Ingen\">Ingen</option>
<option value=\"Laktosfri\">Laktosfri</option>
<option value=\"Glutenfri\">Glutenfri</option>
<option value=\"Laktosfri och Glutenfri\">Laktosfri och Glutenfri</option>
</select>";


	//print utf8_encode($returnstring);
	print $returnstring;

	?>	


<input type="submit" value="Sök">
</form> 


	
</body>
</html>
