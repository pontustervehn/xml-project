<?php
$recnamn = $_POST['receptnamn'];
$beskrivning = $_POST['beskrivning'];
$instruktion = $_POST['instruktion'];
$tidsatgang = $_POST['tidsatgang'];
$kategori = $_POST['kategori'];
$specialkost = $_POST['specialkost'];
$ingrediensnamn = $_POST['ingrediensnamn'];
$mangd = $_POST['mangd'];
$mattenhet = $_POST['mattenhet'];
	


//$beskrivning = nl2br($beskrivning);
//$beskrivning = stripslashes($beskrivning);
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="index.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, user-scalable=yes"/>
<title>Detaljvy, 
<?php
print $recnamn;
?>
</title>
</head>
<body>
<h2>
<?php
print('Du har lagt till receptet: ');
print $recnamn;
?>
</h2>


<?php

    // Connect using host, username, password and databasename
    $link = mysqli_connect('localhost', 'pontustv', 'pontustv-xmlpub13', 'pontustv');

    // Check connection
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    // The SQL query
    $query = "INSERT INTO `pontustv`.`recept` (`receptnamn`, `beskrivning`, `instruktion`, `tidsatgang`) VALUES ('$recnamn', '$beskrivning', '$instruktion', '$tidsatgang')";
	
	if (($result = mysqli_query($link, $query)) === false) {
       printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
       exit();
    }

	$receptid=mysqli_insert_id($link);


    $query = "INSERT INTO `pontustv`.`kategori` (
		`receptid`,
		`kategorinamn`
		)
		VALUES (
		'$receptid', '$kategori'
		)";
		
	if (($result = mysqli_query($link, $query)) === false) {
       printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
       exit();
    }		

		
	$query = "INSERT INTO `pontustv`.`specialkost` (
		`receptid`,
		`specialkostnamn`
		)
		VALUES (
		'$receptid', '$specialkost'
		)";

	
	if (($result = mysqli_query($link, $query)) === false) {
       printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
       exit();
    }

	
	
	foreach($ingrediensnamn as $index => $value) {
		if (!empty($ingrediensnamn[$index])){
			$query = "INSERT INTO `pontustv`.`ingrediens` (
				`receptid`,
				`ingrediensnamn`,
				`mangd`,
				`mattenhet`
				)
				VALUES (
					'$receptid','$ingrediensnamn[$index]','$mangd[$index]','$mattenhet[$index]'
				)";

			if (($result = mysqli_query($link, $query)) === false) {
	       		printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
	       		exit();
			}    
		}
	}
	
	
	
	?>

<table>
	<tr>
		<td><form><input type="button" value="Tillbaka till startsidan" onClick="window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/index.php'"/></form>
		</td>

		<td><form><input type="button" value="Lägg till nytt recept" onClick="window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/laggtill.php'"/></form>
		</td>
	</tr>

	<tr>
		<td><a href=<?php echo "http://xml.csc.kth.se/~pontustv/DM2517/project/detaljvy.php?recid=$receptid&detaljvy"?>><?php echo "$recnamn" ?></a>
		</td>
	</tr>
</table>
	
</body>
</html>