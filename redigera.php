<?php
$recid = utf8_encode($_GET['recid']);
?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="index.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, user-scalable=yes"/>
<title>Redigera recept
</title>
</head>
<body>
<h2>Redigera recept</h2>
<table><tr>
<td><form><input type="button" value="Tillbaka till startsidan" onClick="window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/index.php'"/></form></td>

<td>
<form action=<?php echo "tagbortsvar.php?recid=$recid"?> method="post" onsubmit="return confirm('Är du säker på att du vill ta bort receptet?')">
<input type="submit" value="Tag bort recept"/></form>
</td>
</tr>


<tr><td><form><input type="button" value="Tillbaka till receptlistan" onClick="window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/receptlista.php'"/></form></td>
</tr>

<tr>
	<td><form><input type="button" value="Tillbaka till detaljvyn" onClick=<?php echo "window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/detaljvy.php?recid=$recid&detaljvy'"?>></form>
	</td>
</tr>

</table>


<form name="input" action="redigerasvar.php?recid=<?php	print($recid)?>" method="POST">	


<?php	

    // Connect using host, username, password and databasename
    $link = mysqli_connect('localhost', 'pontustv', 'pontustv-xmlpub13', 'pontustv');

    // Check connection
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    // The SQL query
    $query = "SELECT  *
	FROM  recept
	LEFT JOIN kategori USING (receptid)
	LEFT JOIN specialkost USING (receptid)
	LEFT JOIN ingrediens USING (receptid)
	WHERE receptid=$recid";
	

	
    // Execute the query
    if (($result = mysqli_query($link, $query)) === false) {
       printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
       exit();
    }

 	$returnstring = '';
    // Loop over the resulting lines
    while ($line = $result->fetch_object()) {
        // Store results from each row in variables
		$receptnamn = $line->receptnamn;
        $beskrivning = $line->beskrivning;
		//$beskrivning = htmlspecialchars_decode($beskrivning);
        $instruktion = $line->instruktion;
        $tidsatgang = $line->tidsatgang;
		$specialkostnamn = $line->specialkostnamn;
		$kategorinamn = $line->kategorinamn;
		
		$ingredienslista[] = $line->ingrediensnamn;
		$mangdlista[] = $line->mangd;
		$mattenhetlista[] = $line->mattenhet;
		
		
        // Store the result we want by appending strings to the variable $returnstring
    }

	$returnstring .= "Receptnamn<br><input type=\"text\" name=\"receptnamn\" value=\"$receptnamn\" required><br><br>";
	$returnstring .= "Beskrivning<br><textarea cols=\"30\" name=\"beskrivning\" rows=\"10\">$beskrivning</textarea><br><br>";
	$returnstring .= "Instruktion<br><textarea cols=\"30\" name=\"instruktion\" rows=\"10\">$instruktion</textarea><br><br>";
	$returnstring .= "Tidsåtgång (i hela minuter)<br><input type=\"int\" name=\"tidsatgang\" value=\"$tidsatgang\"><br><br>";
	
	
	if ($kategorinamn == "Kakor") {
	$optkakor = "selected='selected'";}else {$optkakor = "";}
	if ($kategorinamn == "Bullar") {
	$optbullar = "selected='selected'";}else {$optbullar = "";}
	if ($kategorinamn == "Tårtor") {
	$opttartor = "selected='selected'";}else {$opttartor = "";}
	if ($kategorinamn == "Bröd") {
	$optbrod = "selected='selected'";}else {$optbrod = "";}
	if ($kategorinamn == "Knäck och kola") {
	$optknack = "selected='selected'";}else {$optknack = "";}
	if ($kategorinamn == "Övrigt") {
	$optovrigt = "selected='selected'";}else {$optovrigt = "";}

	
	$returnstring .= "Kategori<br>
<select name=\"kategori\">
<option value=\"Kakor\" $optkakor>Kakor</option>
<option value=\"Bullar\" $optbullar>Bullar</option>
<option value=\"Tårtor\" $opttartor>Tårtor</option>
<option value=\"Bröd\" $optbrod>Bröd</option>
<option value=\"Knäck och Kola\" $optknack>Knäck och kola</option>
<option value=\"Övrigt\" $optovrigt>Övrigt</option>
</select><br><br>";
	
	
	if ($specialkostnamn == "Ingen") {
	$optingen = "selected='selected'";}else {$optingen = "";}
	if ($specialkostnamn == "Laktosfri") {
	$optlaktos = "selected='selected'";}else {$optlaktos = "";}
	if ($specialkostnamn == "Glutenfri") {
	$optgluten = "selected='selected'";}else {$optgluten = "";}
	if ($specialkostnamn == "Laktosfri och Glutenfri") {
	$optlaktglut = "selected='selected'";}else {$optlaktglut = "";}

	
	$returnstring .= "Specialkost<br>
<select name=\"specialkost\">
<option value=\"Ingen\" $optingen>Ingen</option>
<option value=\"Laktosfri\" $optlaktos>Laktosfri</option>
<option value=\"Glutenfri\" $optgluten>Glutenfri</option>
<option value=\"Laktosfri och Glutenfri\" $optlaktglut>Laktosfri och Glutenfri</option>
</select><br><br><br>";
	
	
	
	$returnstring .= "<h3><u>Ingredienser</u></h3>
	<table>
	<tr>
	<td>Ingrediensnamn</td>
	<td>Mängd</td>
	<td>Måttenhet</td>
	</tr>
	";
	
	$i = 0;
	foreach($ingredienslista as $index => $value) {
		$i++;
		$returnstring .= "<tr>
	<td><input type=\"text\" name=\"ingrediensnamn[]\" value=\"$ingredienslista[$index]\"></td>
	<td id=\"tabellkolumner\"><input  id=\"tabellfalt\" type=\"text\" name=\"mangd[]\" value=\"$mangdlista[$index]\"></td>
	<td id=\"tabellkolumner\"><input  id=\"tabellfalt\" type=\"text\" name=\"mattenhet[]\" value=\"$mattenhetlista[$index]\"></td>
	</tr>";	
	 }
	
	$iamount = 10-$i;
	
	while ($iamount >0) {
		$returnstring .= "<tr>
	<td><input type=\"text\" name=\"ingrediensnamn[]\"></td>
	<td id=\"tabellkolumner\"><input  id=\"tabellfalt\" type=\"text\" name=\"mangd[]\"></td>
	<td id=\"tabellkolumner\"><input  id=\"tabellfalt\" type=\"text\" name=\"mattenhet[]\"></td>
	</tr>";
	$iamount--;
	}
	
	
	$returnstring .= "</table>";

    // Free result and just in case encode result to utf8 before returning
    mysqli_free_result($result);

	//print utf8_encode($returnstring);
	print $returnstring;

	?>	


<br><br>

<input type="submit" value="Redigera receptet">
</form> 


<!--
 <form><input type="button" value="Receptlista" onClick="window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/lista.php'"></form> 
 <form><input type="button" value="Sök recept" onClick="window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/sok.php'"></form> 
 <form><input type="button" value="Lägg till nytt recept" onClick="window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/laggtill.php'"></form> 
-->


	
</body>
</html>
