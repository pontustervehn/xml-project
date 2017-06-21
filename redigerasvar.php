<?php
$recid = utf8_encode($_GET['recid']);

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
print('Du har redigerat receptet: ');
print $recnamn;
?>
<br/>
<form><input type="button" value="Tillbaka till receptet" onClick=<?php echo "window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/detaljvy.php?recid=$recid&detaljvy'"?>></form>	
</h2>

<br>

<?php

    // Connect using host, username, password and databasename
    $link = mysqli_connect('localhost', 'pontustv', 'pontustv-xmlpub13', 'pontustv');

	
    // Check connection
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }


	
    // The SQL query
    $query = "UPDATE  `pontustv`.`recept` SET  `receptnamn` =  '$recnamn',
`beskrivning` =  '$beskrivning',
`instruktion` =  '$instruktion',
`tidsatgang` =  '$tidsatgang' WHERE  `recept`.`receptid` =$recid";
	
	if (($result = mysqli_query($link, $query)) === false) {
       printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
       exit();
    }

    $query = "UPDATE  `pontustv`.`kategori` SET  `kategorinamn` =  '$kategori' WHERE  `kategori`.`receptid` =$recid";
		
		
	if (($result = mysqli_query($link, $query)) === false) {
       printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
       exit();
    }		

		
	$query = "UPDATE  `pontustv`.`specialkost` SET  `specialkostnamn` =  '$specialkost' WHERE  `specialkost`.`receptid` =$recid";
	
	if (($result = mysqli_query($link, $query)) === false) {
       printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
       exit();
    }

	
	
	$query = "DELETE FROM `pontustv`.`ingrediens` WHERE `ingrediens`.`receptid` = $recid";
	
	if (($result = mysqli_query($link, $query)) === false) {
       printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
       exit();
    }
	
	foreach($ingrediensnamn as $index => $value) {
		if (!empty($ingrediensnamn[$index])){
			//$ingrediensnamn[$index]=utf8_decode($ingrediensnamn[$index]);
			//$mangd[$index]=utf8_decode($mangd[$index]);
			//$mattenhet[$index]=utf8_decode($mattenhet[$index]);
			
			$query = "INSERT INTO `pontustv`.`ingrediens` (
				`receptid`,
				`ingrediensnamn`,
				`mangd`,
				`mattenhet`
				)
				VALUES (
					'$recid','$ingrediensnamn[$index]','$mangd[$index]','$mattenhet[$index]'
				)";

				
			if (($result = mysqli_query($link, $query)) === false) {
	       		printf("Query failed: %s<br />\n%s", $query, mysqli_error($link));
	       		exit();
			}    
		}
	}
	
	
	
	?>


	
</body>
</html>