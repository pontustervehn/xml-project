<?php
$kategori = $_POST['kategori'];
$specialkost = $_POST['specialkost'];
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="index.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, user-scalable=yes"/>
<title>Sökresultat 
</title>
</head>
<body>
<table><tr>
<td><form><input type="button" value="Tillbaka till startsidan" onClick="window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/index.php'"/></form></td>
<td><form><input type="button" value="Sök nytt recept" onClick="window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/sok.php'"/></form></td>
</tr>
</table>
<h2>
Sökresultat
</h2>
<b>
<?php
print('Visar recept i kategorin:  ');
print $kategori;
print(' (specialkost: ');
print $specialkost;
print('):');
?>
</b>
<br/>
<br/>

<?php
    // Connect using host, username, password and databasename
    $link = mysqli_connect('localhost', 'pontustv', 'pontustv-xmlpub13', 'pontustv');

    // Check connection
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }


	//if ospecificerad and if not ingen ==> laktos/gluten/laktglut
	if ($kategori == 'ospecificerad' AND $specialkost != 'Ingen') {
    // The SQL query
    $query = "SELECT  *
	FROM  recept
	LEFT JOIN kategori USING (receptid)
	LEFT JOIN specialkost USING (receptid)
	WHERE specialkostnamn='$specialkost'";
	
    // Execute the query
    if (($result = mysqli_query($link, $query)) === false) {
       printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
       exit();
    }
	}

	
	//if ospecificerad and if ingen ==> receptlista (allt)
	if ($kategori == 'ospecificerad' AND $specialkost == 'Ingen') {
    // The SQL query
    $query = "SELECT  *
	FROM  recept
	LEFT JOIN kategori USING (receptid)
	LEFT JOIN specialkost USING (receptid)";
	
    // Execute the query
    if (($result = mysqli_query($link, $query)) === false) {
       printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
       exit();
    }
	}	
	
	
	//if not ospecificerad and if ingen ==> kategori
	if ($kategori != 'ospecificerad' AND $specialkost == 'Ingen') {
    // The SQL query
    $query = "SELECT  *
	FROM  recept
	LEFT JOIN kategori USING (receptid)
	LEFT JOIN specialkost USING (receptid)
	WHERE kategorinamn='$kategori'";
	
    // Execute the query
    if (($result = mysqli_query($link, $query)) === false) {
       printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
       exit();
    }
	}	
	
	//if not ospecificerad and if not ingen ==> kategori+specialkost
	if ($kategori != 'ospecificerad' AND $specialkost != 'Ingen') {
    // The SQL query
    $query = "SELECT  *
	FROM  recept
	LEFT JOIN kategori USING (receptid)
	LEFT JOIN specialkost USING (receptid)
	WHERE kategorinamn='$kategori' AND specialkostnamn='$specialkost'";
	
    // Execute the query
    if (($result = mysqli_query($link, $query)) === false) {
       printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
       exit();
    }
	}	
	

   $returnstring = '';
    // Loop over the resulting lines
    while ($line = $result->fetch_object()) {
        // Store results from each row in variables
        $receptnamn = $line->receptnamn;
		//$receptnamn = htmlspecialchars($receptnamn);
		$receptid = $line->receptid;

		
        // Store the result we want by appending strings to the variable $returnstring
		//$returnstring .= "<recept namn='$receptnamn' lank=detaljvy.php?recid='$receptid'&recnamn='$receptnamn'>";
		//$returnstring .= "<recept namn=\"$receptnamn\" lank=\"detaljvy.php?recid=$receptid&recnamn=$receptnamn\">";
		$returnstring .= "<a href='detaljvy.php?recid=$receptid&amp;detaljvy'>$receptnamn</a><br/>";
    }

    // Free result and just in case encode result to utf8 before returning
    mysqli_free_result($result);
    print $returnstring;
	//print $returnstring;

	?>


	
</body>
</html>