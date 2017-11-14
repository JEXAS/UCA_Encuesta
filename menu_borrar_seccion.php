<form action=borrar_seccion.php method=POST>
<h1> Listado de Secciones </h1>
<?php
  //Conectar con la BD
 $servername = "";
 $username = "";
 $password = "";
 $database = "proy_encuesta";

 // Create connection
 $conn = new PDO("mysql:dbname=$database;host=$servername", $username, $password);

 $secc = $conn->query('SELECT * FROM Seccion');

 foreach($secc as $row)
  echo "<input type=radio name=id_seccion value=".$row['id_seccion']."> ".$row['nombre_seccion']."<BR>";
?>
<BR><input type=submit value=BORRAR><BR><BR>
</form>
