<?php include 'prefix.php'; ?>

<?php
$recid = utf8_encode($_GET['recid']);
?>

<receptlista>

<?php
    // Connect using host, username, password and databasename
    include("db_settings_cfg.php");  
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
        $instruktion = $line->instruktion;
        $tidsatgang = $line->tidsatgang;
		$specialkostnamn = $line->specialkostnamn;
		$kategorinamn = $line->kategorinamn;

		$ingredienslista[] = $line->ingrediensnamn;
		$mangdlista[] = $line->mangd;
		$mattenhetlista[] = $line->mattenhet;


        // Store the result we want by appending strings to the variable $returnstring
    }

	$returnstring .= "<recept receptid=\"$recid\" receptnamn=\"$receptnamn\" kategori=\"$kategorinamn\" tidsatgang=\"$tidsatgang\" specialkost=\"$specialkostnamn\">";
	$returnstring .= "<beskrivning>$beskrivning</beskrivning>";
	foreach($ingredienslista as $index => $value) {
		$returnstring .= "<ingrediens ingrediensnamn=\"$ingredienslista[$index]\" mangd=\"$mangdlista[$index]\" mattenhet=\"$mattenhetlista[$index]\"/>";
	 }
	$returnstring .= "<instruktion>$instruktion</instruktion>";
	$returnstring .= "</recept>";


    // Free result and just in case encode result to utf8 before returning
    mysqli_free_result($result);
    //print utf8_encode($returnstring.$receptlista);
	//print utf8_encode($returnstring);
	print $returnstring;

	?>

</receptlista>

	<?php include 'postfix.php';?>
