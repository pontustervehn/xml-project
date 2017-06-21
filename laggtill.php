<html>
<head>
<link rel="stylesheet" type="text/css" href="index.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, user-scalable=yes"/>
<title>Lägg till recept
</title>
</head>
<body>
<form><input type="button" value="Tillbaka till startsidan" onClick="window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/index.php'"/></form>
	
<h2>Lägg till recept</h2>
	
	
<form name="input" action="laggtillsvar.php" method="POST">
Receptnamn<br><input type="text" name="receptnamn" required><br><br>
Beskrivning<br><textarea cols="30" name="beskrivning" rows="10"></textarea><br><br>
Instruktion<br><textarea cols="30" name="instruktion" rows="10"></textarea><br><br>
Tidsåtgång (i hela minuter)<br><input type="int" name="tidsatgang"><br><br>

Kategori<br>
<select name="kategori">
<option value="Kakor">Kakor</option>
<option value="Bullar">Bullar</option>
<option value="Tårtor">Tårtor</option>
<option value="Bröd">Bröd</option>
<option value="Knäck och kola">Knäck och kola</option>
<option value="Övrigt">Övrigt</option>
</select><br><br>


Specialkost<br>
<select name="specialkost">
<option value="Ingen">Ingen</option>
<option value="Laktosfri">Laktosfri</option>
<option value="Glutenfri">Glutenfri</option>
<option value="Laktosfri och Glutenfri">Laktosfri och Glutenfri</option>
</select><br><br><br>

<h3><u>Ingredienser</u></h3>
<table>
	<tr>
	<td>Ingrediensnamn</td>
	<td>Mängd</td>
	<td>Måttenhet</td>
	</tr>
	
	
	<tr>
	<td><input type="text" name="ingrediensnamn[]"></td>
	<td id="tabellkolumner"><input  id="tabellfalt" type="text" name="mangd[]"></td>
	<td id="tabellkolumner"><input  id="tabellfalt" type="text" name="mattenhet[]"></td>
	</tr>
	
	<tr>
	<td><input type="text" name="ingrediensnamn[]"></td>
	<td id="tabellkolumner"><input  id="tabellfalt" type="text" name="mangd[]"></td>
	<td id="tabellkolumner"><input  id="tabellfalt" type="text" name="mattenhet[]"></td>
	</tr>

	<tr>
	<td><input type="text" name="ingrediensnamn[]"></td>
	<td id="tabellkolumner"><input  id="tabellfalt" type="text" name="mangd[]"></td>
	<td id="tabellkolumner"><input  id="tabellfalt" type="text" name="mattenhet[]"></td>
	</tr>
	
	<tr>
	<td><input type="text" name="ingrediensnamn[]"></td>
	<td id="tabellkolumner"><input  id="tabellfalt" type="text" name="mangd[]"></td>
	<td id="tabellkolumner"><input  id="tabellfalt" type="text" name="mattenhet[]"></td>
	</tr>
	
	<tr>
	<td><input type="text" name="ingrediensnamn[]"></td>
	<td id="tabellkolumner"><input  id="tabellfalt" type="text" name="mangd[]"></td>
	<td id="tabellkolumner"><input  id="tabellfalt" type="text" name="mattenhet[]"></td>
	</tr>
	
	<tr>
	<td><input type="text" name="ingrediensnamn[]"></td>
	<td id="tabellkolumner"><input  id="tabellfalt" type="text" name="mangd[]"></td>
	<td id="tabellkolumner"><input  id="tabellfalt" type="text" name="mattenhet[]"></td>
	</tr>
	
	<tr>
	<td><input type="text" name="ingrediensnamn[]"></td>
	<td id="tabellkolumner"><input  id="tabellfalt" type="text" name="mangd[]"></td>
	<td id="tabellkolumner"><input  id="tabellfalt" type="text" name="mattenhet[]"></td>
	</tr>
	
	<tr>
	<td><input type="text" name="ingrediensnamn[]"></td>
	<td id="tabellkolumner"><input  id="tabellfalt" type="text" name="mangd[]"></td>
	<td id="tabellkolumner"><input  id="tabellfalt" type="text" name="mattenhet[]"></td>
	</tr>
	
	<tr>
	<td><input type="text" name="ingrediensnamn[]"></td>
	<td id="tabellkolumner"><input  id="tabellfalt" type="text" name="mangd[]"></td>
	<td id="tabellkolumner"><input  id="tabellfalt" type="text" name="mattenhet[]"></td>
	</tr>
	
	<tr>
	<td><input type="text" name="ingrediensnamn[]"></td>
	<td id="tabellkolumner"><input  id="tabellfalt" type="text" name="mangd[]"></td>
	<td id="tabellkolumner"><input  id="tabellfalt" type="text" name="mattenhet[]"></td>
	</tr>

</table>



<br><br>


<input type="submit" value="Lägg till receptet">
</form> 


<!--
 <form><input type="button" value="Receptlista" onClick="window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/lista.php'"></form> 
 <form><input type="button" value="Sök recept" onClick="window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/sok.php'"></form> 
 <form><input type="button" value="Lägg till nytt recept" onClick="window.location.href='http://xml.csc.kth.se/~pontustv/DM2517/project/laggtill.php'"></form> 
-->


	
</body>
</html>
