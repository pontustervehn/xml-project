<?php
$recid = utf8_encode($_GET['recid']);

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="index.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, user-scalable=yes"/>
<title>Tag bort recept 
</title>
</head>
<body>
<h2>
<?php
print('Du har tagit bort receptet: ');
?>	

<?php

    // Connect using host, username, password and databasename
    $link = mysqli_connect('localhost', 'pontustv', 'pontustv-xmlpub13', 'pontustv');

    // Check connection
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $query = "SELECT * FROM  recept WHERE receptid=$recid";
	
    // Execute the query
    if (($result = mysqli_query($link, $query)) === false) {
       printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
       exit();
    }

 	$returnstring = '';
    // Loop over the resulting lines
    while ($line = $result->fetch_object()) {
		$receptnamn = $line->receptnamn;
		}
	echo "$receptnamn";


    // The SQL query
    $query = "DELETE FROM `pontustv`.`recept` WHERE `recept`.`receptid` = $recid;";
	
	if (($result = mysqli_query($link, $query)) === false) {
       printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
       exit();
    }

	?>
</h2>


<table>
	<tr>
		<td><form><input type="button" value="Tillbaka till startsidan" 			onClick="window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/index.php'"/></form></td>

		<td><form><input type="button" value="Tillbaka till receptlistan" onClick="window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/receptlista.php'"/></form></td>
	</tr>
</table>

	
</body>
</html>