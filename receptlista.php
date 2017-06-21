<?php include 'prefix.php'; ?>

<receptlista>
<titel>Receptlista</titel>
	
<?php
    // Connect using host, username, password and databasename
    $link = mysqli_connect('localhost', 'pontustv', 'pontustv-xmlpub13', 'pontustv');
	
    // Check connection
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    // The SQL query
    $query = "SELECT receptid,receptnamn FROM recept";

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
		//$receptnamn = htmlspecialchars($receptnamn);
		$receptid = $line->receptid;

		
        // Store the result we want by appending strings to the variable $returnstring
		//$returnstring .= "<recept namn='$receptnamn' lank=detaljvy.php?recid='$receptid'&recnamn='$receptnamn'>";
		//$returnstring .= "<recept namn=\"$receptnamn\" lank=\"detaljvy.php?recid=$receptid&recnamn=$receptnamn\">";
		$returnstring .= "<recept namn=\"$receptnamn\" lank=\"detaljvy.php?recid=$receptid&amp;detaljvy\"/>";
    }

    // Free result and just in case encode result to utf8 before returning
    mysqli_free_result($result);
    print $returnstring;
	//print $returnstring;

	?>
	
	<?php
	print '</receptlista>';
	?>

<?php include 'postfix.php';?>