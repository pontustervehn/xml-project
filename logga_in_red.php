<?php
$recid = utf8_encode($_GET['recid']);
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="index.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, user-scalable=yes"/>

<title>Lägg till recept
</title>
</head>
<body>
<form><input type="button" value="Tillbaka till receptet" onClick="window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/detaljvy.php?recid=<?php echo $recid;?>&amp;detaljvy'"/></form>
<br/>
<form action="verif_red.php?recid=<?php echo $recid;?>" method="post">
    Användarnamn:<br/>
    <input type="text" name="username"> (admin)<br/><br/>
    Lösenord:<br/>
    <input type="password" name="password"> (password)<br/><br/>
    <input type="submit" name="submit" value="Logga in">
</form>
</body>
</html>

